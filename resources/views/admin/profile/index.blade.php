@extends('layouts.admin')

@section('title', 'Manage Profile — Admin')

@section('content')
<div class="dash-topbar">
    <h2>Manage Profile & About</h2>
</div>

<div class="dash-content">
    <div class="dash-section card" style="padding:2rem;">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;">
                <!-- LEFT COL -->
                <div>
                    <h3 style="margin-bottom:1.2rem;">Public Bio Sections</h3>
                    <div class="form-group">
                        <label>Career Objective</label>
                        <textarea name="career_objective" style="min-height:120px;" required>{{ $profile->career_objective ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Who I Am</label>
                        <textarea name="who_i_am" style="min-height:120px;" required>{{ $profile->who_i_am ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Learning Journey</label>
                        <textarea name="learning_journey" style="min-height:120px;" required>{{ $profile->learning_journey ?? '' }}</textarea>
                    </div>
                    
                    <h3 style="margin:2rem 0 1.2rem;">Profile Photos</h3>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <div class="form-group">
                            <label>Hero Photo (Home Page)</label>
                            <input type="file" name="photo_hero" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>About Photo (Home Page)</label>
                            <input type="file" name="photo_about" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Sidebar Photo (About Page)</label>
                            <input type="file" name="photo_sidebar" accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- RIGHT COL -->
                <div>
                    <h3 style="margin-bottom:1.2rem;">Contact & Details</h3>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" value="{{ $profile->location ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ $profile->email ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number (Optional)</label>
                        <input type="text" name="phone" value="{{ $profile->phone ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Degree (Short, e.g. B.E. Computer Science)</label>
                        <input type="text" name="education_short" value="{{ $profile->education_short ?? '' }}">
                    </div>
                    
                    <div style="margin-top:2rem;text-align:right;">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Save Profile Settings
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
