<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::latest()->get();
        return view('admin.education.index', compact('education'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string',
            'degree' => 'required|string',
            'institution' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Education::create($validated);

        return back()->with('success', 'Education record added successfully!');
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'year' => 'required|string',
            'degree' => 'required|string',
            'institution' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $education->update($validated);

        return back()->with('success', 'Education record updated successfully!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return back()->with('success', 'Education record deleted successfully!');
    }
}
