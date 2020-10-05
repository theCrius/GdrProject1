<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $filliable=[
        'id_classe','id_hemispere','id_breed','name','description'
    ];
}
