<?php

namespace App;

use App\Classes\MoneyHandle;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use MoneyHandle;
    
    protected $fillable=[

        'motivazione' , 'quantita' , 'id_user_from' , 'id_user_to' 

    ];
    public function userTo(){
        return $this->belongsTo('App\User','id_user_to','id')->select(['name']);
    }

    public function userFrom(){
        return $this->belongsTo('App\User','id_user_from','id')->select(['name']);
    }

}
