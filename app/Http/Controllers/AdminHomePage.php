<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomePage extends Controller
{
    public function AdminHomePage() {
        return view('AdminHomePage');
    }
}
