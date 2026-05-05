<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // FRONTEND
        Skill::create(['name' => 'HTML5', 'category' => 'Frontend', 'icon' => 'fab fa-html5', 'level' => 5, 'description' => 'Semantic markup, accessibility best practices, SEO-friendly structure.']);
        Skill::create(['name' => 'CSS3', 'category' => 'Frontend', 'icon' => 'fab fa-css3-alt', 'level' => 5, 'description' => 'Flexbox, Grid, animations, transitions, CSS variables, responsive design.']);
        Skill::create(['name' => 'JavaScript', 'category' => 'Frontend', 'icon' => 'fab fa-js', 'level' => 4, 'description' => 'ES6+, DOM manipulation, async/await, Fetch API.']);
        Skill::create(['name' => 'React', 'category' => 'Frontend', 'icon' => 'fab fa-react', 'level' => 4, 'description' => 'Hooks, component architecture, state management.']);
        Skill::create(['name' => 'Tailwind CSS', 'category' => 'Frontend', 'icon' => 'fab fa-css3', 'level' => 3, 'description' => 'Utility-first CSS framework for rapid development.']);
        Skill::create(['name' => 'Bootstrap', 'category' => 'Frontend', 'icon' => 'fab fa-bootstrap', 'level' => 4, 'description' => 'Responsive grid system, pre-built UI components.']);

        // BACKEND
        Skill::create(['name' => 'Laravel', 'category' => 'Backend', 'icon' => 'fab fa-laravel', 'level' => 4, 'description' => 'MVC, Eloquent, Blade, REST APIs, authentication.']);
        Skill::create(['name' => 'PHP', 'category' => 'Backend', 'icon' => 'fab fa-php', 'level' => 4, 'description' => 'Object-oriented PHP, form handling, server-side logic.']);
        Skill::create(['name' => 'Node.js', 'category' => 'Backend', 'icon' => 'fab fa-node-js', 'level' => 3, 'description' => 'Express.js, RESTful API development.']);

        // DATABASE
        Skill::create(['name' => 'MySQL', 'category' => 'Database', 'icon' => 'fas fa-database', 'level' => 4, 'description' => 'Database design, complex queries, joins, indexing.']);
        Skill::create(['name' => 'SQLite', 'category' => 'Database', 'icon' => 'fas fa-server', 'level' => 3, 'description' => 'Lightweight relational database for development.']);

        // TOOLS
        Skill::create(['name' => 'Git & GitHub', 'category' => 'Tools', 'icon' => 'fab fa-git-alt', 'level' => 4, 'description' => 'Version control, branching, pull requests.']);
        Skill::create(['name' => 'Figma', 'category' => 'Tools', 'icon' => 'fab fa-figma', 'level' => 3, 'description' => 'UI/UX design, wireframing, prototyping.']);
        Skill::create(['name' => 'VS Code', 'category' => 'Tools', 'icon' => 'fas fa-terminal', 'level' => 5, 'description' => 'Extensions, debugging, workspace customization.']);
    }
}
