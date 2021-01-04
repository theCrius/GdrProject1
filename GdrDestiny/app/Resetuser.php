<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resetuser extends Model
{
    protected $fillable= [

        'codice' , 'exp' , 'money'

    ];
}
