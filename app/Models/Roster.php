<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $table = 'rosters';
    protected $primaryKey = 'roster_id';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';


    protected $fillable = [
        'date',
        'supervisor_id',
        'doctor_id',
        'caregiver_1_id',
        'caregiver_2_id',
        'caregiver_3_id',
        'caregiver_4_id'
    ];

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, 'doctor_id');
    }

    public function caregiver1()
    {
        return $this->belongsTo(Employee::class, 'caregiver_1_id');
    }

    public function caregiver2()
    {
        return $this->belongsTo(Employee::class, 'caregiver_2_id');
    }

    public function caregiver3()
    {
        return $this->belongsTo(Employee::class, 'caregiver_3_id');
    }

    public function caregiver4()
    {
        return $this->belongsTo(Employee::class, 'caregiver_4_id');
    }
}
