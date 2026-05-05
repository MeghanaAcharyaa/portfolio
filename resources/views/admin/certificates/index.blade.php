@extends('layouts.admin')

@section('title', 'Manage Certificates — Admin')

@section('content')
<div class="dash-topbar">
    <h2>Manage Certificates</h2>
    <button class="btn btn-primary" onclick="openAddModal()">
        <i class="fas fa-plus"></i> Add New
    </button>
</div>

<div class="dash-content">
    <div class="dash-section">
        <div class="messages-table">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Issuer</th>
                            <th>Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $cert)
                        <tr>
                            <td>
                                @if($cert->photo)
                                    <img src="{{ asset($cert->photo) }}" alt="" style="height:40px; border-radius:4px;">
                                @else
                                    <span style="color:var(--text-muted); font-size:0.7rem;">No photo</span>
                                @endif
                            </td>
                            <td>{{ $cert->title }}</td>
                            <td>{{ $cert->issuer }}</td>
                            <td>{{ $cert->year }}</td>
                            <td>
                                <button class="btn btn-sm btn-accent" onclick="openEditModal({{ json_encode($cert) }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.certificates.destroy', $cert) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ADD/EDIT MODAL -->
<div class="modal-overlay" id="certModal">
    <div class="modal">
        <div class="modal-header">
            <h3 id="modalTitle">Add Certificate</h3>
            <button class="modal-close" onclick="closeCertModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="certForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="methodField"></div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="form-title" required>
            </div>
            <div class="form-group">
                <label>Issuer</label>
                <input type="text" name="issuer" id="form-issuer" required>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" id="form-year" required>
            </div>
            <div class="form-group">
                <label>FontAwesome Icon (e.g. fab fa-react)</label>
                <input type="text" name="icon" id="form-icon" value="fas fa-certificate">
            </div>
            <div class="form-group">
                <label>Certificate Photo (Image)</label>
                <input type="file" name="photo" id="form-photo">
            </div>
            <div style="display:flex;gap:0.8rem;justify-content:flex-end;margin-top:1rem;">
                <button type="button" class="btn btn-outline" onclick="closeCertModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Certificate</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('certModal');
    const form = document.getElementById('certForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');

    function openAddModal() {
        modalTitle.innerText = 'Add Certificate';
        form.action = "{{ route('admin.certificates.store') }}";
        methodField.innerHTML = '';
        form.reset();
        modal.classList.add('active');
    }

    function openEditModal(cert) {
        modalTitle.innerText = 'Edit Certificate';
        form.action = `/admin/certificates/${cert.id}`;
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('form-title').value = cert.title;
        document.getElementById('form-issuer').value = cert.issuer;
        document.getElementById('form-year').value = cert.year;
        document.getElementById('form-icon').value = cert.icon;
        modal.classList.add('active');
    }

    function closeCertModal() {
        modal.classList.remove('active');
    }
</script>
@endsection
