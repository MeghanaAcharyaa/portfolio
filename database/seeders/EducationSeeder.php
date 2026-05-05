<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'year' => '2022 – Present',
            'degree' => 'Bachelor of Technology — Computer Science',
            'institution' => 'Srinivas University',
            'description' => 'Currently pursuing a degree in Computer Science, focusing on full-stack development and modern web technologies.',
        ]);

        Education::create([
            'year' => '2018 – 2020',
            'degree' => 'Pre-University Education — PCMCS',
            'institution' => 'Govt. PU College, Dharwad',
            'description' => 'Completed PUC with Physics, Chemistry, Mathematics, and Computer Science. Secured 92% aggregate.',
        ]);

        Education::create([
            'year' => '2017 – 2018',
            'degree' => 'Secondary School — SSLC',
            'institution' => "St. Joseph's High School, Hubli",
            'description' => 'Completed SSLC with a 94% aggregate. Participated in science exhibitions and coding competitions.',
        ]);
    }
}
