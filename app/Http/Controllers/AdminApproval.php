<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminApproval extends Controller
{
    public function index() {

        $pendingUsers = User::where('acc_approval', '0')->get();

        return view ('AdminApproval', compact('pendingUsers'));
}

public function userStatus(Request $request) {
        $user_id = $request->input('user_id');

         if ($request->has('approve')) {
          User::where('user_id', $user_id)->update(['acc_approval' => '1']);
         }
            elseif($request-> has('reject')) {

            User::where('user_id', $user_id)->delete();
                return redirect()->route('AdminApproval');
            }
        }
    }
