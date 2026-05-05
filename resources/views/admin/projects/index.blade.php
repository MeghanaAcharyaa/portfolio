@extends('layouts.admin')

@section('title', 'Manage Projects — Admin')

@section('content')
<div class="dash-topbar">
    <h2>Manage Projects</h2>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category }}</td>
                            <td>{{ $project->tags }}</td>
                            <td>
                                <button class="btn btn-sm btn-accent" onclick="openEditModal({{ json_encode($project) }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
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
<div class="modal-overlay" id="projectModal">
    <div class="modal">
        <div class="modal-header">
            <h3 id="modalTitle">Add Project</h3>
            <button class="modal-close" onclick="closeProjectModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="projectForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="methodField"></div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="form-title" required>
            </div>
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="image" id="form-image" accept="image/*">
                <p style="font-size:0.7rem;color:var(--text-muted);margin-top:0.2rem;">Leave empty to keep current image or use default.</p>
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" id="form-category" placeholder="e.g. Web App, Frontend">
            </div>
            <div class="form-group">
                <label>Tags (Comma separated)</label>
                <input type="text" name="tags" id="form-tags" placeholder="e.g. Laravel, React, MySQL">
            </div>
            <div class="form-group">
                <label>Project Link</label>
                <input type="text" name="link" id="form-link" placeholder="https://...">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="form-description" style="min-height:100px;" required></textarea>
            </div>
            <div style="display:flex;gap:0.8rem;justify-content:flex-end;margin-top:1rem;">
                <button type="button" class="btn btn-outline" onclick="closeProjectModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Project</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('projectModal');
    const form = document.getElementById('projectForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');

    function openAddModal() {
        modalTitle.innerText = 'Add Project';
        form.action = "{{ route('admin.projects.store') }}";
        methodField.innerHTML = '';
        form.reset();
        modal.classList.add('active');
    }

    function openEditModal(project) {
        modalTitle.innerText = 'Edit Project';
        form.action = `/admin/projects/${project.id}`;
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('form-title').value = project.title;
        document.getElementById('form-category').value = project.category;
        document.getElementById('form-tags').value = project.tags;
        document.getElementById('form-link').value = project.link;
        document.getElementById('form-description').value = project.description;
        modal.classList.add('active');
    }

    function closeProjectModal() {
        modal.classList.remove('active');
    }
</script>
@endsection
