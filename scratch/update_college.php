<?php
use App\Models\Profile;
use App\Models\Education;

$profile = Profile::first();
if ($profile) {
    $profile->who_i_am = str_replace('KLE Technological University', 'Srinivas University', $profile->who_i_am);
    $profile->save();
    echo "Profile updated.\n";
}

// Also check Education timeline
$education = Education::where('institution', 'KLE Technological University, Hubli')->first();
if ($education) {
    $education->institution = 'Srinivas University';
    $education->save();
    echo "Education record updated.\n";
}
