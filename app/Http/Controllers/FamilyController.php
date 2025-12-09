<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\CaregiverDuty;

class FamilyController extends Controller
{
    public function home(Request $request)
    {
        $familyCode = $request->input('family_code');
        $patientId = $request->input('patient_id');
        $date = $request->input('date', date('Y-m-d'));

        $patient = null;
        $doctor = null;
        $caregiver = null;
        $duties = null;

        if ($familyCode && $patientId) {
            $patient = Patient::where('patient_id', $patientId)
                ->where('family_code', $familyCode)
                ->first();

            if ($patient) {
                $doctor = $patient->doctor;
                $caregiver = $patient->caregiver;
                $duties = CaregiverDuty::where('patient_id', $patient->patient_id)
                    ->where('date', $date)
                    ->first();
            }
        }

        return view('Familys_Home', compact('patient', 'doctor', 'caregiver', 'duties', 'date', 'familyCode', 'patientId'));
    }
}
