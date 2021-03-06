<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        
        'name','id_topmap','id_middlemap','id_bottommap','visibility'

    ];
}
