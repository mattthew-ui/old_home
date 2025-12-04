<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaregiverDuty;

class CaregiverController extends Controller
{
    public function home()
    {
        $caregiverId = 3; // Temp caregiver user (replace later)
        $today = date("Y-m-d");

        $duties = CaregiverDuty::where('caregiver_id', $caregiverId)
            ->where('date', $today)
            ->with('patient.user')
            ->orderBy('date', 'asc')
            ->get();
                
        return view('caregivers_home', compact('duties'));
    }

    public function updateDuties(Request $request)
    {
        foreach($request->duties as $dutyId => $values){
            CaregiverDuty::where('duty_id', $dutyId)->update([
                'morning_medicine' => isset($values['morning_medicine']) ? 1 : 0,
                'afternoon_medicine' => isset($values['afternoon_medicine']) ? 1 : 0,
                'evening_medicine' => isset($values['evening_medicine']) ? 1 : 0,
                'breakfast' => isset($values['breakfast']) ? 1 : 0,
                'lunch' => isset($values['lunch']) ? 1 : 0,
                'dinner' => isset($values['dinner']) ? 1 : 0,
            ]);
        }

        return redirect('/caregiver/home')->with('success', 'Updated.');
    }
}
