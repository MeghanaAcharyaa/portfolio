<?php
use App\Models\Profile;

$p = Profile::first();
if ($p) {
    $p->education_short = 'B.Tech Student';
    $p->save();
    echo "Profile education_short updated.\n";
}
