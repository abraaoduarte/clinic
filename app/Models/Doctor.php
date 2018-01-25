<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name', 
        'address', 
        'number_address', 
        'zipcode',
        'birthday',
        'city',
        'state',
        'country',
        'cpf',
        'speciality',
        'hospital',
        'gender',
        'phone',
        'crm',
        'email',
    ];

    protected $dates = [
        'birthday',
    ];

    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }
}
