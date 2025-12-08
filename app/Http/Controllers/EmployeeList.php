<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeList extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $query = DB::table('employees')
            ->join('users', 'employees.employee_id', '=', 'users.user_id')
            ->whereIn('users.role_id', [3, 4])      // Doctors & Caregivers
            ->where('users.acc_approval', 1)        // ✅ ONLY approved users
            ->select(
                'employees.employee_id',
                'employees.role_id',
                'employees.salary'
            );

        if ($filter && $search) {
            $query->where("employees.$filter", 'LIKE', "%{$search}%");
        }

        $employees = $query->get();

        return view('EmployeeList', compact('employees', 'filter', 'search'));
    }
}
