<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
        'id_user_to','id_user_from','message','title','letto'
    ];
    public function userTo(){
        return $this->belongsTo('App\User','id_user_to','id')->select(['name']);
    }

    public function userFrom(){
        return $this->belongsTo('App\User','id_user_from','id')->select(['name']);
    }
}
