<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        
        'name','id_topmap','id_middlemap','id_bottommap','visibility','descrizione'

    ];

    public function news()
    {
        return $this->hasMany('\App\Chatnews','id_chat','id')->orderBy('created_at','asc');
    }
    public function map()
    {
        if( $this->id_topmap )
        {
            $classMap = 'topmap';

        }else if($this->id_middlemap )
        {
            $classMap = 'middlemap';

        }else if($this->id_bottommap)
        {
            $classMap = 'bottommap';
        }
    
        return $this->belongsTo("\App\\" . ucfirst($classMap),'id_' . $classMap ,'id');
    }
    
}
