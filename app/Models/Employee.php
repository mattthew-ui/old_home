<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';           // Existing table
    protected $primaryKey = 'employee_id';    // Primary key in your table
    public $timestamps = false;               // Your table doesn’t have created_at / updated_at

    protected $fillable = ['role_id', 'salary'];
}
