<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userisincure extends Model
{

    protected $fillable  = [
        'doctor', 'patient','start_cure','finish_cure','point_recupered_at_day','sanitamentale','medicalrecordsToDelete'
    ];

    protected $casts = [
        'medicalrecordsToDelete' => 'array'
    ];

    public function getPatient()
    {
        return $this->belongsTo('\App\User','patient','id');
    }
}
