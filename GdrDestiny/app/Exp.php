<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    protected $fillable=[
        'quantita' , 'id_user_to' , 'id_user_from' , 'motivazione'
    ];

    public function userTo(){
        return $this->belongsTo('App\User','id_user_to','id')->select(['name']);
    }

    public function userFrom(){
        return $this->belongsTo('App\User','id_user_from','id')->select(['name']);
    }



}
