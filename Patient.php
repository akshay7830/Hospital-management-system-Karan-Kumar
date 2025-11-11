<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Patient extends Model
{
use HasFactory;


protected $fillable = ['name','email','phone','age','gender','address'];


public function appointments()
{
return $this->hasMany(Appointment::class);
}


public function bills()
{
return $this->hasMany(Bill::class);
}
}