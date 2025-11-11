<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Appointment extends Model
{
use HasFactory;


protected $fillable = ['patient_id','doctor_id','scheduled_at','reason','status'];


protected $dates = ['scheduled_at'];


public function patient() { return $this->belongsTo(Patient::class); }
public function doctor() { return $this->belongsTo(Doctor::class); }
}