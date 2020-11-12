<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userspecialization extends Model
{
    protected $filliable=[
        'id_user','id_specialization'
    ];

    public function spec(){
        return $this->belongsTo('App\Specialization','id_specialization','id');
    }
}
