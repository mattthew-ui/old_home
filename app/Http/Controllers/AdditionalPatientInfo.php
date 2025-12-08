<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdditionalPatientInfo extends Controller
{
    public function index(Request $request)
    {
        $patientId = $request->input('patient_id');

        $patient = null;

        if ($patientId) {
            $patient = DB::table('patients')
                ->join('users', 'patients.patient_id', '=', 'users.user_id')
                ->select(
                    'users.user_id as patient_id',
                    'users.fname',
                    'users.lname',
                    'patients.group_name',
                    'patients.admission_date'
                )
                ->where('patients.patient_id', $patientId)
                ->first();
        }

        return view('AdditionalInfo', compact('patient'));
    }
}
