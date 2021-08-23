<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [

        'id_user','text_sent','typology','id_chat','id_quest','id_user_receive'

    ];
}

