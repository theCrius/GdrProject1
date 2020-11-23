<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $filliable=[
        'id_user_from','id_user_to','hurtposition','descrizione','danno'
    ];
}
