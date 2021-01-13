<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userloggedlog extends Model
{
    protected $fillable=[
        'id_user' , 'ip'
    ];
}
