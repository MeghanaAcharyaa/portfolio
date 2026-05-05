<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();
        
        $validated = $request->validate([
            'career_objective' => 'required|string',
            'who_i_am' => 'required|string',
            'learning_journey' => 'required|string',
            'location' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'education_short' => 'nullable|string',
            'photo_hero' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_about' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_sidebar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $validated;

        // Handle Photos
        foreach (['photo_hero', 'photo_about', 'photo_sidebar'] as $photo) {
            if ($request->hasFile($photo)) {
                if ($profile && $profile->$photo) {
                    Storage::disk('public')->delete($profile->$photo);
                }
                $path = $request->file($photo)->store('profile', 'public');
                $data[$photo] = $path;
            }
        }

        if ($profile) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return back()->with('success', 'Profile updated successfully!');
    }
}
