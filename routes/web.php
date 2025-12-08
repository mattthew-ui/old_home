<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\AdminApproval;
use App\Http\Controllers\PatientController;

Route::get('/daily-roster', [RosterController::class, 'dailyRoster']);

Route::get('/new-roster', [RosterController::class, 'newRoster']);
Route::post('/new-roster', [RosterController::class, 'storeRoster']);

Route::get('/doctor/home', [DoctorController::class, 'home']);
Route::get('/doctor/patient/{id}', [DoctorController::class, 'patientPage']);
Route::post('/doctor/patient/{id}/new-prescription', [DoctorController::class, 'storePrescription']);

Route::get('/doctor-appointment', [DoctorController::class, 'createAppointmentPage']);
Route::get('/get-patient-name/{id}', [DoctorController::class, 'getPatientName']);
Route::post('/doctor-appointment', [DoctorController::class, 'storeAppointment']);

Route::get('/caregiver/home', [CaregiverController::class, 'home']);
Route::post('/caregiver/update', [CaregiverController::class, 'updateDuties']);

// Route::get('/AdminHomePage', [AdminHomePage::class, 'AdminHomePage'])
//     -> name('AdminHomePage');

Route::get('/payment', [Payment::class, 'paymentPage']);

Route::get('/AdminApproval', [AdminApproval::class, 'index'])
    -> name('AdminApproval');

// Route::post('/AdminApproval', [AdminApproval::class, 'userStatus'])
//     -> name('userAppStatus');

Route::get('/AdminHomePage', function () {
    return view('AdminHomePage');
});

Route::get('/AdminHomePage', function () {
    return view('AdminHomePage');
});

Route::get('/patient/home', [PatientController::class, 'home']);

Route::get('/patients', [PatientController::class, 'index']);

Route::get('/family/home', function () {
    return view('Familys_Home');
});