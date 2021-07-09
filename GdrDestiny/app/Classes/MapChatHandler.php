<?php 
namespace App\Classes;

trait MapChatHandler
{
    public function getLastMap()
    {
        if ( $this->last_chat['nameRoute'] === 'topmap' )  
        { 
            $parametres = $this->last_chat['parametres'] ? $this->last_chat['parametres'] : 1;

            $nameMap = \App\Topmap::findOrFail($parametres)->name;
        }else if( $this->last_chat['nameRoute'] === 'middlemap' )
        {
            $nameMap = \App\Middlemap::findOrFail($this->last_chat['parametres'])[0]->name;
        }else if( $this->last_chat['nameRoute'] === 'bottommap')
        {
            $nameMap = \App\Bottommap::findOrFail($this->last_chat['parametres'])[0]->name;
            
        }else if( $this->last_chat['nameRoute'] === 'chat')
        {
            $nameMap = \App\Chat::findOrFail($this->last_chat['parametres'])[0]->map->name;
        }

        return $nameMap;
        
    }

    public function getLastChatInfo()
    {  
        $parametres = $this->last_chat['parametres'] ? $this->last_chat['parametres'] : 1;

        $chat = \App\Chat::findOrFail($parametres)[0] ;

        return [ 
            'chat' => $chat, 
            'news' => $chat->news
        ];
    }
}


?>