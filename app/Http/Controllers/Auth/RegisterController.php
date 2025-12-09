<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role' => 'required|integer',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:project_users,email',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'password' => 'required|string|min:6'
        ]);

        ProjectUser::create([
            'role_id' => $request->role,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->dob,
            'password' => Hash::make($request->password),
            'status' => 'pending'
        ]);

        return redirect()->route('login')->with('message', 'Registration submitted! Pending admin approval.');
    }
}
