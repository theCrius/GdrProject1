<?php
namespace App\Classes;

trait CheckStatusUser
{


    public function ifUserIsOnline( $usersonline , $user = null)
    {
        $result = null;
        if ( !$user ) $user = $this->user;

        foreach($usersonline as $key => $useronline)
        {
            if( $useronline['infoPg']['name'] === ( $user['infoPg']['name'] ?? $user->name ) ) $result = $key;
            $this->checkLastUpate($useronline,$key);
        }

        return $result ?? -1;

    }

    public function setStatusOnline()
    {
        $idUsersOnline = \Cache::get('users-online') ?? []; // ottengo la lista delle persone online

        if ( $this->ifUserIsOnline($idUsersOnline) != -1 ) return ;

        array_push( $idUsersOnline ,[ 
            'last_chat' => $this->user->last_chat, 
            'nameMap' => $this->user->getLastMap(),
            'infoPg' => [
                'name' => $this->user->name,
                'sesso' => $this->user->sesso,
                'razza' => [ 'name' => $this->user->breed->name , 'immagine' => $this->user->breed->immagini ],
                'emisfero' => [ 'name' => $this->user->hemispere->name , 'immagine' => $this->user->hemispere->immagini ],
                'classi' => $this->user->classes,
                'id' => $this->user->id
            ], 
             'last_update' => now()
        ]);
        \Cache::put('users-online',$idUsersOnline);

        return $idUsersOnline;


        

    }

    public function setStatusOffline($user=null,$index_user=null)
    {
        $idUsersOnline = \Cache::get('users-online') ?? [];
        if ( !$index_user && $index_user !== 0 )
        {
            $index_user = $this->ifUserIsOnline( $idUsersOnline , $user );
        }
        if ( $index_user == -1 )  return;
        unset( $idUsersOnline[$index_user] );

        \Cache::put('users-online' , $idUsersOnline );
        
        return $idUsersOnline;
    

    }
    public function refreshLastChat()
    {
        $idUsersOnline = \Cache::get('users-online') ?? [];
        
        $index_user = $this->ifUserIsOnline($idUsersOnline);
        
        if( $index_user == -1){ return $this->setStatusOnline(); }

        $idUsersOnline[$index_user] = [ 
            'last_chat' => $this->user->last_chat, 
            'nameMap' => $this->user->getLastMap(),
            'infoPg' => [
                'name' => $this->user->name,
                'sesso' => $this->user->sesso,
                'razza' => [ 'name' => $this->user->breed->name , 'immagine' => $this->user->breed->immagini ],
                'emisfero' => [ 'name' => $this->user->hemispere->name , 'immagine' => $this->user->hemispere->immagini ],
                'classi' => $this->user->classes,
                'id' => $this->user->id
            ], 
             'last_update' => now()
        ];

        \Cache::put('users-online' , $idUsersOnline );
        
        return $idUsersOnline;
    
    
    }


    public function checkLastUpate($user,$index_user)
    {
        if ( now() > $user['last_update']->toImmutable()->addMinutes(config('session.lifetime') ) ) $this->setStatusOffline($user, $index_user);
    }
}

?>