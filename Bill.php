<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Bill extends Model
{
use HasFactory;


protected $fillable = ['patient_id','appointment_id','amount','status','paid_at'];


protected $dates = ['paid_at'];

public function patient() { 
    return $this->belongsTo(\App\Models\Patient::class); 
}

public function appointment() { 
    return $this->belongsTo(\App\Models\Appointment::class); 
}

}