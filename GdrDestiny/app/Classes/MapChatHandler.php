<?php 
namespace App\Classes;

trait MapChatHandler
{
    public function getLastMap()
    {
        if ( $this->last_chat['nameRoute'] === 'home' )  
        { 
            $nameMap = $this->last_chat['nameRoute'];
        }else if( $this->last_chat['nameRoute'] === 'middlemap' )
        {
            $nameMap = \App\Middlemap::findOrFail($this->last_chat['parametres'])[0]->name;
        }else if( $this->last_chat['nameRoute'] === 'bottommap')
        {
            $nameMap = \App\Bottommap::findOrFail($this->last_chat['parametres'])[0]->name;
        }
        
        return $nameMap;

    }
}


?>