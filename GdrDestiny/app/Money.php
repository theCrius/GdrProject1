<?php

namespace App;

use App\Classes\MoneyHandle;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use MoneyHandle;
    
    protected $fillable=[

        'motivo' , 'soldi' , 'id_user_from' , 'id_user_to' 

    ];

}
