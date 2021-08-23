<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatnews extends Model
{
    protected $fillable=[
        'id_user','id_chat','descrizione'
    ];
    protected $table='chatnews';


    public function user()
    {
        return $this->belongsTo('\App\User','id_user','id')->select('id','name');
    }
    
    
    
}
