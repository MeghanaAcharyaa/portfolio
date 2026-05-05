<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'issuer' => 'required|string',
            'year' => 'required|string',
            'icon' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/certificates'), $imageName);
            $validated['photo'] = 'uploads/certificates/'.$imageName;
        }

        Certificate::create($validated);
        return back()->with('success', 'Certificate added successfully!');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'issuer' => 'required|string',
            'year' => 'required|string',
            'icon' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/certificates'), $imageName);
            $validated['photo'] = 'uploads/certificates/'.$imageName;
        }

        $certificate->update($validated);
        return back()->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('success', 'Certificate deleted successfully!');
    }
}
