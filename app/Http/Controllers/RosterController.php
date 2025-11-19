<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;

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
}
