<?php
namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;


class AppointmentController extends Controller
{
public function index(){ $appointments = Appointment::with(['patient','doctor'])->latest()->paginate(15); return view('appointments.index', compact('appointments')); }


public function create(){ $patients = Patient::all(); $doctors = Doctor::all(); return view('appointments.create', compact('patients','doctors')); }


public function store(Request $r){
$data = $r->validate(['patient_id'=>'required|exists:patients,id','doctor_id'=>'required|exists:doctors,id','scheduled_at'=>'required|date','reason'=>'nullable']);
Appointment::create($data);
return redirect()->route('appointments.index')->with('success','Appointment scheduled');
}


public function show(Appointment $appointment){ return view('appointments.show', compact('appointment')); }


public function edit(Appointment $appointment){ $patients=Patient::all(); $doctors=Doctor::all(); return view('appointments.edit', compact('appointment','patients','doctors')); }


public function update(Request $r, Appointment $appointment){ $appointment->update($r->only(['patient_id','doctor_id','scheduled_at','reason','status'])); return redirect()->route('appointments.show',$appointment); }


public function destroy(Appointment $appointment){ $appointment->delete(); return back(); }
}