<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $primaryKey = "patient_id";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(ProjectUser::class, "patient_id", "user_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, "doctor_assigned_id");
    }

    public function caregiver()
    {
        return $this->belongsTo(Employee::class, "caregiver_assigned_id");
    }

    public function appointments()
    {
        return $this->hasMany(DoctorsAppointment::class, "patient_id");
    }

    public function prescriptions()
    {
        return $this->hasMany(CaregiverDuty::class, "patient_id");
    }
}
