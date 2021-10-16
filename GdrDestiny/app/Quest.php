<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = [
        'started','finished' , 'id_user','name','id_chat'
    ];

    public $timestamps = false;

}
