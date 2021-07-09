<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatnews extends Model
{
    protected $fillable=[
        'id_user','id_chat','descrizione'
    ];
    protected $table='chatnews';
    
    
    
}
