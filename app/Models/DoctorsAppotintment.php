<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorsAppotintment extends Model
{
    protected $table = "doctors_appointments";
    protected $primaryKey = "appointment_id";
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, "doctor_id");
    }
}
