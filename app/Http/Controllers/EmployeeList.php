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
            ->leftJoin('project_users', 'employees.employee_id', '=', 'project_users.user_id')
            ->select(
                'employees.employee_id',
                'project_users.fname',
                'project_users.lname',
                'employees.role_id',
                'employees.salary'
            );

        if ($filter && $search) {
            if ($filter === 'employee_id') {
                $query->where('employees.employee_id', 'LIKE', "%{$search}%");
            } elseif ($filter === 'role_id') {
                $query->where('employees.role_id', 'LIKE', "%{$search}%");
            } elseif ($filter === 'salary') {
                $query->where('employees.salary', 'LIKE', "%{$search}%");
            }
        }

        $employees = $query->get();

        return view('EmployeeList', compact('employees', 'filter', 'search'));
    }
}