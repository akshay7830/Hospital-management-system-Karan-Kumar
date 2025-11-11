<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillController;

Route::get('/', function () {
    return redirect()->route('patients.index');
});

Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('appointments', AppointmentController::class);

// ✅ Include all Bill routes (index, create, store, show, edit, update, destroy)
Route::resource('bills', BillController::class);

// ✅ Custom route for marking payment
Route::post('/bills/{bill}/pay', [BillController::class, 'pay'])->name('bills.pay');

// Optional API route
Route::get('api/patients/search', [PatientController::class, 'search']);
