<?php
namespace App\Http\Controllers;


use App\Models\Bill;
use App\Models\Appointment;
use Illuminate\Http\Request;


class BillController extends Controller
{
public function index(){ $bills = Bill::with('patient')->latest()->paginate(20); return view('bills.index', compact('bills')); }


public function store(Request $r){
$data = $r->validate(['patient_id'=>'required|exists:patients,id','appointment_id'=>'nullable|exists:appointments,id','amount'=>'required|numeric']);
$bill = Bill::create($data + ['status'=>'unpaid']);
return redirect()->route('bills.index')->with('success','Bill created');
}

public function create()
{
    // Fetch related models for dropdowns
    $patients = \App\Models\Patient::all();
    $appointments = \App\Models\Appointment::all();

    // Return a view with the data
    return view('bills.create', compact('patients', 'appointments'));
}

public function show(Bill $bill){ return view('bills.show', compact('bill')); }


// For paying a bill (simple)
public function pay(Request $r, Bill $bill){
$bill->update(['status'=>'paid','paid_at'=>now()]);
return redirect()->route('bills.show',$bill)->with('success','Paid');
}
}