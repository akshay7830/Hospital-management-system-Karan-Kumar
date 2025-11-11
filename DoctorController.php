<?php
namespace App\Http\Controllers;


use App\Models\Doctor;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
public function index(){ $doctors = Doctor::paginate(12); return view('doctors.index', compact('doctors')); }
public function create(){ return view('doctors.create'); }
public function store(Request $r){ Doctor::create($r->validate(['name'=>'required','specialty'=>'nullable','email'=>'nullable|email','phone'=>'nullable'])); return redirect()->route('doctors.index'); }
public function show(Doctor $doctor){ return view('doctors.show', compact('doctor')); }
public function edit(Doctor $doctor){ return view('doctors.edit', compact('doctor')); }
public function update(Request $r, Doctor $doctor){ $doctor->update($r->only(['name','specialty','email','phone'])); return redirect()->route('doctors.show',$doctor); }
public function destroy(Doctor $doctor){ $doctor->delete(); return back(); }
}