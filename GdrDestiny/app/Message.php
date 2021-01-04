<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
        'id_user_to','id_user_from','message','title','letto'
    ];
}
