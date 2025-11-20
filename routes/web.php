<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daily-roster', function(){
    return view('daily_roster');
});
Route::get('/daily-roster', [RosterController::class, 'dailyRoster']);

Route::get('/new-roster', function(){
    return view('new_roster');
});
Route::get('/new-roster', [RosterController::class, 'newRoster']);
Route::post('/new-roster', [RosterController::class, 'storeRoster']);

Route::get('/doctor/home', function(){
    return view('doctors_home');
});

Route::get('/caregiver/home', function(){
    return view('caregivers_home');
});