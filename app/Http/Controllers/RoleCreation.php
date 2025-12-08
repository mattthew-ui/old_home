<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleCreation extends Controller

{
    public function index()
    {
        return view('RoleCreation');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|string|max:255',
            'access_level' => 'required|integer',
        ]);

            DB::table('roles')->insert([
            'role_name' => $validatedData['role_name'],
            'access_level' => $validatedData['access_level'],
            ]);
    
        return redirect()->route('RoleCreation');
    }
}
