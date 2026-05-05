@extends('layouts.admin')

@section('title', 'Manage Education — Admin')

@section('content')
<div class="dash-topbar">
    <h2>Manage Education</h2>
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
                            <th>Year</th>
                            <th>Degree</th>
                            <th>Institution</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($education as $item)
                        <tr>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->degree }}</td>
                            <td>{{ $item->institution }}</td>
                            <td>
                                <button class="btn btn-sm btn-accent" onclick="openEditModal({{ json_encode($item) }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.education.destroy', $item) }}" method="POST" style="display:inline;">
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
<div class="modal-overlay" id="educationModal">
    <div class="modal">
        <div class="modal-header">
            <h3 id="modalTitle">Add Education</h3>
            <button class="modal-close" onclick="closeEducationModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="educationForm" method="POST">
            @csrf
            <div id="methodField"></div>
            <div class="form-group">
                <label>Year (e.g. 2020 - 2024)</label>
                <input type="text" name="year" id="form-year" required>
            </div>
            <div class="form-group">
                <label>Degree</label>
                <input type="text" name="degree" id="form-degree" required>
            </div>
            <div class="form-group">
                <label>Institution</label>
                <input type="text" name="institution" id="form-institution" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="form-description" style="min-height:100px;"></textarea>
            </div>
            <div style="display:flex;gap:0.8rem;justify-content:flex-end;margin-top:1rem;">
                <button type="button" class="btn btn-outline" onclick="closeEducationModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('educationModal');
    const form = document.getElementById('educationForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');

    function openAddModal() {
        modalTitle.innerText = 'Add Education';
        form.action = "{{ route('admin.education.store') }}";
        methodField.innerHTML = '';
        form.reset();
        modal.classList.add('active');
    }

    function openEditModal(item) {
        modalTitle.innerText = 'Edit Education';
        form.action = `/admin/education/${item.id}`;
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('form-year').value = item.year;
        document.getElementById('form-degree').value = item.degree;
        document.getElementById('form-institution').value = item.institution;
        document.getElementById('form-description').value = item.description;
        modal.classList.add('active');
    }

    function closeEducationModal() {
        modal.classList.remove('active');
    }
</script>
@endsection
