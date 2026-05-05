<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        Certificate::create([
            'title' => 'React — The Complete Guide',
            'issuer' => 'Udemy',
            'year' => '2023',
            'icon' => 'fab fa-react',
        ]);

        Certificate::create([
            'title' => 'Laravel Framework Mastery',
            'issuer' => 'Coursera',
            'year' => '2023',
            'icon' => 'fab fa-laravel',
        ]);

        Certificate::create([
            'title' => 'Web Development Bootcamp',
            'issuer' => 'freeCodeCamp',
            'year' => '2022',
            'icon' => 'fas fa-code',
        ]);

        Certificate::create([
            'title' => 'MySQL for Beginners to Pro',
            'issuer' => 'Udemy',
            'year' => '2022',
            'icon' => 'fas fa-database',
        ]);

        Certificate::create([
            'title' => 'Cybersecurity Fundamentals',
            'issuer' => 'IBM SkillsBuild',
            'year' => '2024',
            'icon' => 'fas fa-shield-alt',
        ]);
    }
}
