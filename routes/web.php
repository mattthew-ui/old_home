<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdditionalPatientInfo;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\AdminApproval;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\Admin_Report;
use App\Http\Controllers\EmployeeList;
use App\Http\Controllers\RoleCreation;
use App\Http\Controllers\New_Roster;
use App\Http\Controllers\Doctor_Appointment;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/daily-roster', [RosterController::class, 'dailyRoster']);

Route::get('/new-roster', [RosterController::class, 'newRoster']);
Route::post('/new-roster', [RosterController::class, 'storeRoster']);

Route::get('/doctor/home', [DoctorController::class, 'home']);
Route::get('/doctor/patient/{id}', [DoctorController::class, 'patientPage']);
Route::post('/doctor/patient/{id}/new-prescription', [DoctorController::class, 'storePrescription']);

Route::get('/Additional_info', [AdditionalPatientInfo::class, 'index'])
    -> name('Additional_Info');

Route::get('/doctor-appointment', [DoctorController::class, 'createAppointmentPage']);
Route::get('/get-patient-name/{id}', [DoctorController::class, 'getPatientName']);
Route::post('/doctor-appointment', [DoctorController::class, 'storeAppointment']);

Route::get('/caregiver/home', [CaregiverController::class, 'home']);
Route::post('/caregiver/update', [CaregiverController::class, 'updateDuties']);

Route::get('/AdminApproval', [AdminApproval::class, 'index'])
    -> name('AdminApproval');

Route::get('/AdminHomePage', function () {
    return view('AdminHomePage');
});

Route::get('/AdminHomePage', function () {
    return view('AdminHomePage');
});

Route::get('/admin-report', [Admin_Report::class, 'index'])
    ->name('admin_report');

Route::get('/patient/home', [PatientController::class, 'home']);

Route::get('/patients', [PatientController::class, 'index']);

Route::get('/family/home', [FamilyController::class, 'home']);

Route::get('/EmployeeList', [EmployeeList::class, 'index'])
    -> name('EmployeeList');

Route::get('/RoleCreation', [RoleCreation::class, 'index'])
    ->name('RoleCreation');

Route::post('/RoleCreation', [RoleCreation::class, 'store'])
    ->name('storeRoleCreation');

Route::get('/roster/new', [New_Roster::class, 'create'])
->name('roster.new');

Route::post('/roster/new', [New_Roster::class, 'store'])
->name('roster.store');

Route::get('/doctor-appointment', [Doctor_Appointment::class, 'create'])
->name('doctor_appointment.create');

Route::post('/doctor-appointment', [Doctor_Appointment::class, 'store'])
->name('doctor_appointment.store');

Route::get('/doctor-appointment/get-doctors', [Doctor_Appointment::class, 'getDoctorsByDate'])
    ->name('doctor_appointment.get_doctors');

    Route::get('/doctor-appointment/validate_patient', [Doctor_Appointment::class, 'validatePatient'])
    ->name('doctor_appointment.validate_patient');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment/search', [PaymentController::class, 'search'])->name('payment.search');
Route::post('/payment/update-bill', [PaymentController::class, 'updateBill'])->name('payment.updateBill');
Route::post('/payment/new-payment', [PaymentController::class, 'newPayment'])->name('payment.newPayment');
