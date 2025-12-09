<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class New_Roster extends Controller
{
    public function create()
    {

        $supervisors = DB::table('employees')
            ->join('project_users', 'employees.employee_id', '=', 'project_users.user_id')
            ->where('employees.role_id', 2)
            ->select('employees.employee_id', 'project_users.fname', 'project_users.lname')
            ->get();

        $doctors = DB::table('employees')
            ->join('project_users', 'employees.employee_id', '=', 'project_users.user_id')
            ->where('employees.role_id', 3)
            ->select('employees.employee_id', 'project_users.fname', 'project_users.lname')
            ->get();

        $caregivers = DB::table('employees')
            ->join('project_users', 'employees.employee_id', '=', 'project_users.user_id')
            ->where('employees.role_id', 4)
            ->select('employees.employee_id', 'project_users.fname', 'project_users.lname')
            ->get();

        return view('New_Roster', compact('supervisors', 'doctors', 'caregivers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'supervisor_id' => 'required|integer',
        'doctor_id' => 'required|integer',
        'groups' => 'required|array',
        'groups.*.caregiver_id' => 'nullable|integer',
    ]);

    DB::table('rosters')->insert([
        'date' => $request->date,
        'supervisor_id' => $request->supervisor_id,
        'doctor_id' => $request->doctor_id,
        'caregiver_1_id' => $request->groups['A']['caregiver_id'] ?? null,
        'caregiver_2_id' => $request->groups['B']['caregiver_id'] ?? null,
        'caregiver_3_id' => $request->groups['C']['caregiver_id'] ?? null,
        'caregiver_4_id' => $request->groups['D']['caregiver_id'] ?? null,
    ]);

    return redirect()->back()->with('success', 'Roster created successfully!');
}

}