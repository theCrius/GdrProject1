<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellingobjectcategory extends Model
{
    protected $fillable= [
        'name'
    ];
    protected $table='sellingobjectcategorys';
    
    public function getSellingObjects()
    {
        return $this->hasMany('App\Sellingobject','id_category','id');
    }
    
}
