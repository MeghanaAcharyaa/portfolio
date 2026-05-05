@extends('layouts.admin')

@section('title', 'Manage Skills — Admin')

@section('content')
<div class="dash-topbar">
    <h2>Manage Skills</h2>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Level (1-5)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->category }}</td>
                            <td>{{ $skill->level }}</td>
                            <td>
                                <button class="btn btn-sm btn-accent" onclick="openEditModal({{ json_encode($skill) }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline;">
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
<div class="modal-overlay" id="skillModal">
    <div class="modal">
        <div class="modal-header">
            <h3 id="modalTitle">Add Skill</h3>
            <button class="modal-close" onclick="closeSkillModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="skillForm" method="POST">
            @csrf
            <div id="methodField"></div>
            <div class="form-group">
                <label>Skill Name</label>
                <input type="text" name="name" id="form-name" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" id="form-category" required>
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Database">Database</option>
                    <option value="Tools">Tools</option>
                </select>
            </div>
            <div class="form-group">
                <label>Level (1 to 5)</label>
                <input type="number" name="level" id="form-level" min="1" max="5" value="5" required>
            </div>
            <div class="form-group">
                <label>FontAwesome Icon (e.g. fab fa-react)</label>
                <input type="text" name="icon" id="form-icon">
            </div>
            <div class="form-group">
                <label>Description (Short)</label>
                <input type="text" name="description" id="form-description">
            </div>
            <div style="display:flex;gap:0.8rem;justify-content:flex-end;margin-top:1rem;">
                <button type="button" class="btn btn-outline" onclick="closeSkillModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Skill</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('skillModal');
    const form = document.getElementById('skillForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');

    function openAddModal() {
        modalTitle.innerText = 'Add Skill';
        form.action = "{{ route('admin.skills.store') }}";
        methodField.innerHTML = '';
        form.reset();
        modal.classList.add('active');
    }

    function openEditModal(skill) {
        modalTitle.innerText = 'Edit Skill';
        form.action = `/admin/skills/${skill.id}`;
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('form-name').value = skill.name;
        document.getElementById('form-category').value = skill.category;
        document.getElementById('form-level').value = skill.level;
        document.getElementById('form-icon').value = skill.icon;
        document.getElementById('form-description').value = skill.description;
        modal.classList.add('active');
    }

    function closeSkillModal() {
        modal.classList.remove('active');
    }
</script>
@endsection
