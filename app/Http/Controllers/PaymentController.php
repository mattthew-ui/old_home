<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('Payment');
    }

    public function search(Request $request)
    {
        $pid = (int)$request->patient_id;

        $data = DB::table('patients as p')
            ->join('project_users as u', 'p.patient_id', '=', 'u.user_id')
            ->leftJoin('payments as pay', 'pay.patient_id', '=', 'p.patient_id')
            ->select('p.patient_id', 'u.fname', 'u.lname', 'pay.total_due', 'pay.last_update')
            ->where('p.patient_id', $pid)
            ->first();

        if (!$data) {
            return back()->with('message', 'Invalid Patient ID.');
        }

        return back()->with([
            'patient' => $data,
        ]);
    }

    public function updateBill(Request $request)
    {
        $pid = (int)$request->patient_id;

        $payment = DB::table('payments')->where('patient_id', $pid)->first();

        if (!$payment) {
            return back()->with('message', 'Patient not found in payments table.');
        }

        $last = $payment->last_update;
        $today = date('Y-m-d');

        $days = (strtotime($today) - strtotime($last)) / 86400;

        if ($days <= 0) {
            return back()->with('message', 'Bill already up to date.');
        }

        $charge = $days * 10;

        $appt = DB::table('doctors_appointments')
            ->where('patient_id', $pid)
            ->whereBetween('date', [$last, $today])
            ->count();

        $charge += $appt * 50;

        $med = DB::table('caregiver_duties')
            ->where('patient_id', $pid)
            ->whereBetween('date', [$last, $today])
            ->count();

        $charge += $med * 5;

        DB::table('payments')
            ->where('patient_id', $pid)
            ->update([
                'total_due' => $payment->total_due + $charge,
                'last_update' => $today
            ]);

        return back()->with('message', 'Bill updated successfully!');
    }

    public function newPayment(Request $request)
    {
        $pid = (int)$request->patient_id;
        $amount = (int)$request->amount;

        DB::table('payments')
            ->where('patient_id', $pid)
            ->update([
                'total_due' => DB::raw("total_due - $amount")
            ]);

        return back()->with('message', 'Payment Recorded!');
    }
}