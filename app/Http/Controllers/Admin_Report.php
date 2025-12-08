<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_Report extends Controller
{
    public function index()
    {
        // Get all patients with at least one missed activity
        $missed = DB::table('caregiver_duties as cd')
            ->join('patients as p', 'cd.patient_id', '=', 'p.patient_id')
            ->join('users as u', 'p.patient_id', '=', 'u.user_id')
            ->select(
                'p.patient_id',
                'u.fname',
                'u.lname',
                'cd.date',
                'cd.morning_medicine',
                'cd.afternoon_medicine',
                'cd.evening_medicine',
                'cd.breakfast',
                'cd.lunch',
                'cd.dinner'
            )
            ->where(function($query) {
                $query->where('cd.morning_medicine', false)
                      ->orWhere('cd.afternoon_medicine', false)
                      ->orWhere('cd.evening_medicine', false)
                      ->orWhere('cd.breakfast', false)
                      ->orWhere('cd.lunch', false)
                      ->orWhere('cd.dinner', false);
            })
            ->orderBy('cd.date', 'desc')
            ->get();

        return view('Admin_Report', compact('missed'));
    }
}
