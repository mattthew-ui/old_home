<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Employee;
use App\Models\ProjectUser;

class RosterController extends Controller
{
    public function dailyRoster(Request $request)
    {
        $date = $request->input('date', date('Y-m-d'));

        $roster = Roster::with([
            'supervisor.user',
            'doctor.user',
            'caregiver1.user',
            'caregiver2.user',
            'caregiver3.user',
            'caregiver4.user',
        ])
        ->where('date', $date)
        ->first();

        return view('daily_roster', compact('roster', 'date'));
    }

    public function newRoster()
    {
        $supervisors = Employee::where('role_id', 2)
            ->with('user')
            ->get();

        $doctors = Employee::where('role_id', 3)
            ->with('user')
            ->get();

        $caregivers = Employee::where('role_id', 4)
            ->with('user')
            ->get();

        return view('new_roster', compact('supervisors', 'doctors', 'caregivers'));
    }

    public function storeRoster(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'supervisor_id' => 'required',
            'doctor_id' => 'required',
            'caregiver_1_id' => 'required',
        ]);

        Roster::create([
            'date' => $request->date,
            'supervisor_id' => $request->supervisor_id,
            'doctor_id' => $request->doctor_id,
            'caregiver_1_id' => $request->caregiver_1_id,
            'caregiver_2_id' => $request->caregiver_2_id,
            'caregiver_3_id' => $request->caregiver_3_id,
            'caregiver_4_id' => $request->caregiver_4_id,
        ]);

        return redirect('/daily-roster?date=' . $request->date);
    }

}
