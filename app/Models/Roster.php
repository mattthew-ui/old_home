<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $table = 'rosters';
    protected $primaryKey = 'roster_id';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'supervisor_id',
        'doctor_id',
        'caregiver_1_id',
        'caregiver_2_id',
        'caregiver_3_id',
        'caregiver_4_id'
    ];
}