<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'career_objective' => 'To leverage my expertise in full-stack web development to build scalable, user-centric applications that solve real-world problems. I aim to grow as a developer by working on challenging projects that push the boundaries of modern web technology, while contributing positively to the teams and organizations I work with.',
            'who_i_am' => "Hello! I'm Meghana Acharya, a Web Developer based in Udupi, Karnataka. I am pursuing a Bachelor of Engineering in Computer Science at Srinivas University. My journey into web development began in my second year of college when I built my first website — a simple blog — and fell in love with the process.",
            'learning_journey' => 'My learning has been a blend of formal education and self-directed exploration. During college, I built a strong foundation in computer science fundamentals. Outside the classroom, I completed certifications in React, Laravel, and MySQL — applying each new skill to real projects.',
            'location' => 'Udupi, Karnataka, India — 576215',
            'email' => 'meghanaashok.cse@gmail.com',
            'phone' => '+91 9900459722',
            'education_short' => 'B.Tech Student',
        ]);
    }
}
