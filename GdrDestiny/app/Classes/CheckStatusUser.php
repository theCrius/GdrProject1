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
            if( $useronline['name'] === $user->name ) $result = $key;
            $this->checkLastUpate($useronline);
        }

        return $result ?? -1;

    }

    public function setStatusOnline()
    {
        $idUsersOnline = \Cache::get('users-online') ?? []; // ottengo la lista delle persone online

        if ( $this->ifUserIsOnline($idUsersOnline) != -1 ) return ;

        array_push( $idUsersOnline , [ 'name' => $this->user->name, 'last_chat' => $this->user->last_chat , 'id' => $this->user->id , 'last_update' => now()]) ; // creo un nuovo array con le vecchie e nuove informazioni

        \Cache::put('users-online',$idUsersOnline);

        return $idUsersOnline;


        

    }

    public function setStatusOffline($user)
    {
        $idUsersOnline = \Cache::get('users-online') ?? [];
        $index_user = $this->ifUserIsOnline( $idUsersOnline , $user );

        
        
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

        $idUsersOnline[$index_user] = [ 'name' => $this->user->name ,'last_chat' => $this->user->last_chat, 'id' => $this->user->id, 'last_update' => now()];

        \Cache::put('users-online' , $idUsersOnline );
        
        return $idUsersOnline;
    
    
    }


    public function checkLastUpate($user)
    {
        if ( $user['last_update'] > $user['last_update']->addMinutes(env( 'SESSION_LIFETIME' )) ) $this->setStatusOffline($user);
    }
}

?>