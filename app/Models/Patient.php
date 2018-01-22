<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

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
        'rg',
        'description',
        'gender',
        'phone',
        'smoker',
        'alcoholic',
        'bloodtype',
    ];

    protected $dates = [
        'birthday',
    ];

    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }

}