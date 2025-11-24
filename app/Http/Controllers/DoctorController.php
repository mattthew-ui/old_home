<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\DoctorsAppointment;
use App\Models\CaregiverDuty;

class DoctorController extends Controller
{
    public function home()
    {
        $doctorEmployeeId = 2; // Replace when loigin system is added

        $patients = Patient::where("doctor_assigned_id", $doctorEmployeeId)
            ->with("user")
            ->get();
        
        $appointments = CaregiverDuty::where("doctor_id", $doctorEmployeeId)
            ->with("patient.user")
            ->orderBy("date", "desc")
            ->get();
        
        return view("doctors_home", compact("patients", "appointments"));
    }

    public function patientPage($patientId)
    {
        $patient = Patient::with("user")->findOrFail($patientId);

        $prescriptions = CaregiverDuty::where("patient_id", $patientId)
            ->orderBy("date", "desc")
            ->get();
        
        $appointments = DoctorsAppointment::where("patient_id", $patientId)
            ->orderBy("date", "desc")
            ->get();

        return view("patient_of_doctor", compact("patient", "prescriptions", "appointments"));
    }
}
