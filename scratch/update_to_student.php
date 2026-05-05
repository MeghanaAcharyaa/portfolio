<?php
use App\Models\Profile;
use App\Models\Education;

$profile = Profile::first();
if ($profile) {
    $profile->who_i_am = str_replace('I graduated with a Bachelor of Engineering in Computer Science from Srinivas University in 2024', 'I am pursuing a Bachelor of Engineering in Computer Science at Srinivas University', $profile->who_i_am);
    $profile->save();
    echo "Profile updated.\n";
}

$edu = Education::find(1);
if ($edu) {
    $edu->year = '2022 – Present';
    $edu->save();
    echo "Education timeline updated to Present.\n";
}
