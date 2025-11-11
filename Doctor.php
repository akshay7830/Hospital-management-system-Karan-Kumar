<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Doctor extends Model
{
use HasFactory;


protected $fillable = ['name','specialty','email','phone'];


public function appointments()
{
return $this->hasMany(Appointment::class);
}
}