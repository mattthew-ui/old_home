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

    public function index(Request $request)
    {
        $patientsQuery = Patient::with('user')->orderBy('patient_id', 'asc');

        if ($request->search_id) {
            $patientsQuery->where('patient_id', 'like', '%' . $request->search_id . '%');
        }

        if ($request->search_name) {
            $patientsQuery->whereHas('user', function ($q) use ($request) {
                $q->where('fname', 'like', '%' . $request->search_name . '%')
                  ->orWhere('lname', 'like', '%' . $request->search_name . '%');
            });
        }

        if ($request->search_age) {
            $patientsQuery->where('age', 'like', '%' . $request->search_age . '%');
        }

        if ($request->search_relation_to_emergency) {
            $patientsQuery->where('relation_to_emergency', 'like', '%' . $request->search_relation_to_emergency . '%');
        }

        if ($request->search_emergency_contact) {
            $patientsQuery->where('emergency_contact', 'like', '%' . $request->search_emergency_contact . '%');
        }

        if ($request->search_admission_date) {
            $patientsQuery->where('admission_date', 'like', '%' . $request->search_admission_date . '%');
        }

        $patients = $patientsQuery->get();

        return view('Patients', compact('patients'));
    }
}
