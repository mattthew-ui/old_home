<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $table = 'project_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id');
    }
}
