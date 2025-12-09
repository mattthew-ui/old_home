<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roster;

class RosterController extends Controller
{
    public function show(Request $request)
    {
        $date = $request->date ?? date('Y-m-d');

        $roster = Roster::where('date', $date)
            ->with(['supervisor.user', 'doctor.user', 'caregiver1.user', 'caregiver2.user', 'caregiver3.user', 'caregiver4.user'])
            ->first();

        $patientGroups = [];

        return view('Daily_Roster', compact('date', 'roster', 'patientGroups'));
    }
}
