<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectUser;

class AdminApproval extends Controller
{
    public function index()
    {
        $pendingUsers = ProjectUser::where('status', 'pending')->get();
        return view('AdminApproval', compact('pendingUsers'));
    }

    public function userStatus(Request $request)
    {
        $user_id = $request->input('user_id');

        if ($request->has('approve')) {
            ProjectUser::where('user_id', $user_id)
                ->update(['status' => 'approved']);

            return redirect()->route('AdminApproval')
                ->with('message', 'User approved successfully!');
        }

        if ($request->has('reject')) {
            ProjectUser::where('user_id', $user_id)
                ->update(['status' => 'denied']);

            return redirect()->route('AdminApproval')
                ->with('message', 'User rejected.');
        }

        return redirect()->route('AdminApproval');
    }
}