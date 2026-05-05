<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'icon' => 'nullable|string',
            'level' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string',
        ]);

        Skill::create($validated);
        return back()->with('success', 'Skill added successfully!');
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'icon' => 'nullable|string',
            'level' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string',
        ]);

        $skill->update($validated);
        return back()->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted successfully!');
    }
}
