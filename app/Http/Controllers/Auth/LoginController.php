<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show the login form
    public function showForm()
    {
        return view('Login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Get the user by email
        $user = ProjectUser::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('message', 'No account found with that email.');
        }

        // Check if the account is pending or denied
        if ($user->status === 'pending') {
            return back()->with('message', 'Your account is still pending admin approval.');
        }

        if ($user->status === 'denied') {
            return back()->with('message', 'Your account has been denied.');
        }

        // Check password using Laravel's Hash::check
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('message', 'Incorrect password.');
        }

        // Log the user in
        Auth::login($user);

        // Redirect by role
        return $this->redirectByRole($user->role_id);
    }

    // Redirect users based on their role
    private function redirectByRole($role_id)
    {
        switch ($role_id) {
            case 1: return redirect('/AdminHomePage');
            case 2: return redirect('/supervisor/home');
            case 3: return redirect('/doctor/home');
            case 4: return redirect('/caregiver/home');
            case 5: return redirect('/patient/home');
            case 6: return redirect('/family/home');
            default: return redirect('/login');
        }
    }
}