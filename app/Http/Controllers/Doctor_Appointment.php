<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Doctor_Appointment extends Controller
{
    public function create()
    {
        return view('Doctor_Appointment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,patient_id',
            'date' => 'required|date',
            'doctor_id' => 'required|integer',
        ]);

        DB::table('doctors_appointments')->insert([
            'appointment_id' => time(),
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Doctor appointment created successfully!');
    }

    public function getDoctorsByDate(Request $request)
{
    $date = $request->input('date');

    $doctors = DB::table('rosters')
        ->join('employees', 'rosters.doctor_id', '=', 'employees.employee_id')
        ->join('project_users', 'employees.employee_id', '=', 'project_users.user_id')
        ->where('rosters.date', $date)
        ->where('project_users.role_id', 3)
        ->select('employees.employee_id', 'project_users.fname', 'project_users.lname')
        ->distinct()
        ->get();

    return response()->json($doctors);
}


public function validatePatient(Request $request)
{
    $patient_id = $request->input('patient_id');

    $valid = DB::table('patients')
        ->where('patient_id', $patient_id)
        ->exists();

    return response()->json(['valid' => $valid]);
}

}