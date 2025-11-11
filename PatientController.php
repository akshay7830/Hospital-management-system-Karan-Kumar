<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display all patients
    public function index()
    {
        $patients = Patient::latest()->paginate(12);
        return view('patients.index', compact('patients'));
    }

    // Show create form
    public function create()
    {
        return view('patients.create');
    }

    // Store new patient
    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Patient::create($data);
        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    // Show single patient
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // ✅ Show edit form
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // ✅ Update patient details
    public function update(Request $r, Patient $patient)
    {
        $data = $r->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $patient->update($data);
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Optional: Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
