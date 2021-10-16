<?php 
namespace App\Classes;

use Illuminate\Support\Facades\Storage;

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
            $nameMap = \App\Chat::where('id',$this->last_chat['parametres'])->get()[0]->map->name;
        }

        return $nameMap;
        
    }

    public function getLastChatInfo()
    {  
        $parametres = $this->last_chat['parametres'] ? $this->last_chat['parametres'] : 1;

        $chat = \App\Chat::where('id',$parametres)->with('news','quest')->get()[0] ;
        $images =  [];
        for( $i = 0 ; $i < \Config::get('gdrConsts.chat.max_images'); $i++ )
        {
            
            $images[$i]= empty(Storage::files('public/homeinterna/images/chats/' . $chat->id . '/' . $i)) ? null : basename(Storage::files('public/homeinterna/images/chats/' . $chat->id . '/' . $i)[0]) ;
        }
        $chat->immagini = $images;
        return [ 
            'chat' => $chat,
        ];
    }
}


?>