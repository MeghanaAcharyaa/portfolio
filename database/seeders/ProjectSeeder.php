<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A full-featured online store with product catalog, cart, and order management.',
            'category' => 'Web App',
            'tags' => 'Laravel,MySQL,CSS3',
            'link' => '#',
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => 'A clean productivity app with drag-and-drop tasks, deadlines, and team collaboration.',
            'category' => 'Frontend',
            'tags' => 'React,JavaScript,CSS',
            'link' => '#',
        ]);

        Project::create([
            'title' => 'Blog CMS',
            'description' => 'A content management system with rich text editing, categories, and SEO tools.',
            'category' => 'Fullstack',
            'tags' => 'Laravel,MySQL,JS',
            'link' => '#',
        ]);
    }
}
