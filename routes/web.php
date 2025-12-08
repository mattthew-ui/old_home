<?php
use App\Http\Controllers\RoleCreation;
use App\Http\Controllers\AdditionalPatientInfo;
use App\Http\Controllers\AdminApproval;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomePage;
use App\Http\Controllers\Payment;
use App\Http\Controllers\New_Roster;
use App\Http\Controllers\EmployeeList;
use App\Http\Controllers\Doctor_Appointment;
use App\Http\Controllers\Admin_Report;

Route::get('/AdminHomePage', [AdminHomePage::class, 'AdminHomePage'])
    -> name('AdminHomePage');

Route::get('/payment', [Payment::class, 'paymentPage']);

Route::get('/AdminApproval', [AdminApproval::class, 'index'])
    -> name('AdminApproval');

Route::post('/AdminApproval', [AdminApproval::class, 'userStatus'])
    -> name('userAppStatus');

Route::get('/Additional_info', [AdditionalPatientInfo::class, 'index'])
    -> name('Additional_Info');

    Route::get('/RoleCreation', [RoleCreation::class, 'index'])
        -> name('RoleCreation');

Route::post('/RoleCreation', [RoleCreation::class, 'store'])
    -> name('storeRoleCreation');

    Route::get('/EmployeeList', [EmployeeList::class, 'index'])
        -> name('EmployeeList');

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

    Route::get('/doctor_appointment/validate_patient', [Doctor_Appointment::class, 'validatePatient'])
    ->name('doctor_appointment.validate_patient');

    Route::get('/admin-report', [Admin_Report::class, 'index'])
    ->name('admin_report');

