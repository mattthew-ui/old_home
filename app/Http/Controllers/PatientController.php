<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\CaregiverDuty;
use Auth;

class PatientController extends Controller
{
    public function home(Request $request)
    {
        // replace with Auth::user()->user_id when authentication is ready
        $patientId = 7;
        $patient = Patient::where('patient_id', $patientId)->first();

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient record not found');
        }

        $date = $request->input('date', date('Y-m-d'));

        $duties = CaregiverDuty::where('patient_id', $patient->patient_id)
            ->where('date', $date)
            ->first();

        $doctor = $patient->doctor;
        $caregiver = $patient->caregiver;

        return view('Patients_homePage', compact('patient', 'doctor', 'caregiver', 'duties', 'date'));
    }
}
