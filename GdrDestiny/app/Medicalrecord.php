<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicalrecord extends Model
{
    protected $fillable=[
        'id_user_from','id_user_to','hurtposition','descrizione','danno'
    ];

    public function userWhoAddHurt(){
        return $this->belongsTo('\App\User','id_user_from','id');
    }
}
