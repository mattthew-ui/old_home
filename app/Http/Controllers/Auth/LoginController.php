<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = ProjectUser::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('message', 'No account found with that email.');
        }

        if ($user->status === 'pending') {
            return back()->with('message', 'Your account is still pending admin approval.');
        }

        if ($user->status === 'denied') {
            return back()->with('message', 'Your account was denied.');
        }

        if ($request->password !== $user->password) {
            return back()->with('message', 'Incorrect password.');
        }

        Auth::login($user);

        return $this->redirectByRole($user->role_id);
    }

    private function redirectByRole($role_id)
    {
        switch ($role_id) {
            case 1: return redirect('/patient/home');
            case 2: return redirect('/family/home');
            case 3: return redirect('/caregiver/home');
            case 4: return redirect('/supervisor/home');
            case 5: return redirect('/doctor/home');
            case 6: return redirect('/admin/home');
            case 7: return redirect('/employee/home');
            default: return redirect('/login');
        }
    }
}
