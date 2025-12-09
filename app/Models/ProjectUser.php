<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ProjectUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'project_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'fname',
        'lname',
        'email',
        'phone',
        'password',
        'date_of_birth',
        'status',
    ];

    protected $hidden = [
        'password'
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id');
    }
}
