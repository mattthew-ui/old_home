<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorsAppointment extends Model
{
    protected $table = "doctors_appointments";
    protected $primaryKey = "appointment_id";
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, "doctor_id");
    }
}
