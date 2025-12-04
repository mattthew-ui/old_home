<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\DoctorController;

Route::get('/daily-roster', [RosterController::class, 'dailyRoster']);

Route::get('/new-roster', [RosterController::class, 'newRoster']);
Route::post('/new-roster', [RosterController::class, 'storeRoster']);

Route::get('/doctor/home', [DoctorController::class, 'home']);
Route::get('/doctor/patient/{id}', [DoctorController::class, 'patientPage']);
Route::post('/doctor/patient/{id}/new-prescription', [DoctorController::class, 'storePrescription']);

Route::get('/doctor-appointment', [DoctorController::class, 'createAppointmentPage']);
Route::get('/get-patient-name/{id}', [DoctorController::class, 'getPatientName']);
Route::post('/doctor-appointment', [DoctorController::class, 'storeAppointment']);

Route::get('/caregiver/home', function () {
    return view('caregivers_home');
});