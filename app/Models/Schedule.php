<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
    	'user_id',
    	'doctor_id',
    	'patient_id',
    	'date',
    	'description',
    ];

    protected $dates = [
    	'date',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor');
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }
}
