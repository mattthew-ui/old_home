<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectUser;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $fillable = ['role_id', 'salary'];

    public function user()
    {
        return $this->belongsTo(ProjectUser::class, 'employee_id', 'user_id');
    }
}