<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Payment extends Controller
{
    public function paymentPage() {
        return view('Payment');
    }
}
