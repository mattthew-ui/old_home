<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\DoctorsAppointment;
use App\Models\CaregiverDuty;

class DoctorController extends Controller
{
    public function home(Request $request)
    {
        $doctorEmployeeId = 2; // Replace when loigin system is added
        $tillDate = $request->input('date');

        $appointmentsQuery = CaregiverDuty::where("doctor_id", $doctorEmployeeId)
            ->with("patient.user")
            ->orderBy("date", "desc");
        
        if($request->search_patient){
            $appointmentsQuery->whereHas("patient.user", function($q) use ($request){
                $q->where("fname", "like", "%".$request->search_patient."%")
                ->orWhere("lname", "like", "%".$request->search_patient."%");
            });
        }
        if($request->search_date){
            $appointmentsQuery->where("date", "like", "%".$request->search_date."%");
        }
        if($request->search_comment){
            $appointmentsQuery->where("comment", "like", "%".$request->search_comment."%");
        }
        if($request->search_morning){
            $appointmentsQuery->where("morning_medicine", strtolower($request->search_morning) === "yes" ? 1 : 0);
        }
        if($request->search_afternoon){
            $appointmentsQuery->where("afternoon_medicine", strtolower($request->search_afternoon) === "yes" ? 1 : 0);
        }
        if($request->search_evening){
            $appointmentsQuery->where("evening_medicine", strtolower($request->search_evening) === "yes" ? 1 : 0);
        }

        $upcomingAppointmentsQuery = DoctorsAppointment::where("doctor_id", $doctorEmployeeId)
            ->with("patient.user")
            ->orderBy("date", "asc");

        if($tillDate){
            $upcomingAppointmentsQuery->whereBetween("date", [date("Y-m-d"), $tillDate]);
        }

        $upcomingAppointments = $upcomingAppointmentsQuery->get();

        $patients = Patient::where("doctor_assigned_id", $doctorEmployeeId)
            ->with("user")
            ->get();

        $appointments = $appointmentsQuery->get();

        return view("doctors_home", compact("patients", "appointments", "upcomingAppointments", "tillDate"));
    }

    public function patientPage($patientId)
    {
        $patient = Patient::with("user")->findOrFail($patientId);
        $today = date('Y-m-d');

        $prescriptions = CaregiverDuty::where("patient_id", $patientId)
            ->orderBy("date", "desc")
            ->get();
        
        $appointments = DoctorsAppointment::where("patient_id", $patientId)
            ->orderBy("date", "desc")
            ->get();

        $hasAppointmentToday = DoctorsAppointment::where('patient_id', $patientId)
            ->where('doctor_id', 2) // Note to self: replaceable when authentication is added 
            ->where('date', $today)
            ->exists();

        return view("patient_of_doctor", compact("patient", "prescriptions", "appointments", "hasAppointmentToday"));
    }

    public function storePrescription(Request $request, $patientId)
    {
        $doctorEmployeeId = 2; // placeholder for now

        $request->validate([
            'comment' => 'required|string',
            'morning_medicine' => 'nullable|string',
            'afternoon_medicine' => 'nullable|string',
            'evening_medicine' => 'nullable|string',
        ]);

        CaregiverDuty::create([
            'patient_id' => $patientId,
            'caregiver_id' => 3, // temp placeholder
            'doctor_id' => $doctorEmployeeId,
            'date' => date('Y-m-d'),
            'morning_medicine' => $request->morning_medicine ? 1 : 0,
            'afternoon_medicine' => $request->afternoon_medicine ? 1 : 0,
            'evening_medicine' => $request->evening_medicine ? 1 : 0,
            'breakfast' => 0,
            'lunch' => 0,
            'dinner' => 0,
            'comment' => $request->comment,
        ]);

        return redirect('/doctor/patient/' . $patientId);
    }

    public function createAppointmentPage()
    {
        $doctors = Employee::where('role_id', 3)->with('user')->get();

        return view('doctors_appointment', compact('doctors'));
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'date' => 'required|date',
        ]);

        DoctorsAppointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
        ]);

        // Redirect to admin/supervisor home later
        return redirect('/doctor-appointment')->with('success', 'Appointment Created!');
    }

    public function getPatientName($id)
    {
        $patient = Patient::with('user')->find($id);
        if(!$patient){
            return response()->json(['name' => null]);
        }

        return response()->json([
            'name' => $patient->user->fname . ' ' . $patient->user->lname
        ]);
    }
}
