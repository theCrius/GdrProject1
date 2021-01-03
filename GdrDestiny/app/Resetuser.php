<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resetuser extends Model
{
    protected $filliable= [

        'codice' , 'exp' , 'money'

    ];
}
