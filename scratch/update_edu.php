<?php
use App\Models\Education;

$edu = Education::find(1);
if ($edu) {
    $edu->institution = 'Srinivas University';
    $edu->year = '2020 – 2024';
    $edu->save();
    echo "Education record 1 updated.\n";
}
