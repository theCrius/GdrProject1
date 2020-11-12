<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userskill extends Model
{
    protected $fillable=[
        'id_user','id_skill','livello'
    ];

    public function skill(){
        return $this->belongsTo('App\Skill','id_skill','id');
    }


}
