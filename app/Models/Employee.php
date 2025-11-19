<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
