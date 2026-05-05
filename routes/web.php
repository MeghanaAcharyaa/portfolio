<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Models\Message;
use App\Models\Education;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Skill;
use App\Models\Profile;

Route::get('/', function () {
    $profile = Profile::first();
    if ($profile) {
        $profile->increment('views');
    }
    $education = Education::latest()->get();
    $projects = Project::latest()->limit(3)->get();
    $certificates = Certificate::latest()->get();
    $skills = Skill::all();
    return view('index', compact('education', 'projects', 'certificates', 'profile', 'skills'));
})->name('home');

Route::get('/about', function () {
    $certificates = Certificate::latest()->get();
    $profile = Profile::first();
    $skills = Skill::all();
    return view('about', compact('certificates', 'profile', 'skills'));
})->name('about');

Route::get('/skills', function () {
    $skills = Skill::all();
    return view('skills', compact('skills'));
})->name('skills');

Route::get('/projects', function () {
    $projects = Project::latest()->get();
    return view('projects', compact('projects'));
})->name('projects');

Route::get('/contact', function () {
    $profile = Profile::first();
    return view('contact', compact('profile'));
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Login Routes
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $messages = \App\Models\Message::latest()->get();
        $profile = \App\Models\Profile::first();
        $projects_count = \App\Models\Project::count();
        $certificates_count = \App\Models\Certificate::count();
        return view('dashboard', compact('messages', 'profile', 'projects_count', 'certificates_count'));
    })->name('dashboard');

    // Messages Management
    Route::get('/admin/messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/count', [\App\Http\Controllers\MessageController::class, 'unreadCount'])->name('admin.messages.count');
    Route::delete('/admin/messages/{message}', [\App\Http\Controllers\MessageController::class, 'destroy'])->name('admin.messages.destroy');

    Route::post('/admin/reply', [ContactController::class, 'reply'])->name('admin.reply');

    // Education Management
    Route::get('/admin/education', [EducationController::class, 'index'])->name('admin.education.index');
    Route::post('/admin/education', [EducationController::class, 'store'])->name('admin.education.store');
    Route::put('/admin/education/{education}', [EducationController::class, 'update'])->name('admin.education.update');
    Route::delete('/admin/education/{education}', [EducationController::class, 'destroy'])->name('admin.education.destroy');

    // Projects Management
    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Certificates Management
    Route::get('/admin/certificates', [CertificateController::class, 'index'])->name('admin.certificates.index');
    Route::post('/admin/certificates', [CertificateController::class, 'store'])->name('admin.certificates.store');
    Route::put('/admin/certificates/{certificate}', [CertificateController::class, 'update'])->name('admin.certificates.update');
    Route::delete('/admin/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('admin.certificates.destroy');

    // Skills Management
    Route::get('/admin/skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::post('/admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::put('/admin/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/admin/skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    // Profile/About Management
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
});
