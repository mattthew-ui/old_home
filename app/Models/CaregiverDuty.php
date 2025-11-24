<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaregiverDuty extends Model
{
    protected $table = "caregiver_duties";
    protected $primaryKey = "duty_id";
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, "doctor_id");
    }

    public function caregiver()
    {
        return $this->belongsTo(Employee::class, "caregiver_id");
    }
}
