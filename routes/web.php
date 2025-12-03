<?php

use App\Http\Controllers\AdminApproval;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomePage;
use App\Http\Controllers\Payment;

Route::get('/AdminHomePage', [AdminHomePage::class, 'AdminHomePage'])
    -> name('AdminHomePage');

Route::get('/payment', [Payment::class, 'paymentPage']);

Route::get('/AdminApproval', [AdminApproval::class, 'index'])
    -> name('AdminApproval');

    Route::post('/AdminApproval', [AdminApproval::class, 'userStatus'])
        -> name('userAppStatus');