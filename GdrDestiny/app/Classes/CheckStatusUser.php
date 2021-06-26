<?php
namespace App\Classes;

trait CheckStatusUser
{


    public function ifUserIsOnline( $usersonline )
    {
        foreach($usersonline as $key => $user)
        {
            if( $user['id'] === $this->user->id ) return $key;
        }

        return -1;

    }

    public function setStatusOnline()
    {
        $idUsersOnline = \Cache::get('users-online') ?? []; // ottengo la lista delle persone online

        if ( $this->ifUserIsOnline($idUsersOnline) != -1 ) return ;

        array_push( $idUsersOnline , [ 'id' => $this->user->id, 'last_chat' => $this->user->last_chat ]) ; // creo un nuovo array con le vecchie e nuove informazioni

        \Cache::put('users-online',$idUsersOnline);

        return $idUsersOnline;


        

    }

    public function setStatusOffline()
    {
        $idUsersOnline = \Cache::get('users-online') ?? [];
        $index_user = $this->ifUserIsOnline( $idUsersOnline );

        
        
        if ( $index_user == -1 )  return;
        unset( $idUsersOnline[$index_user] );

        \Cache::put('users-online' , $idUsersOnline );
        
        return $idUsersOnline;
    

    }
    public function refreshLastChat()
    {
        $idUsersOnline = \Cache::get('users-online') ?? [];
        
        $index_user = $this->ifUserIsOnline($idUsersOnline);

        $idUsersOnline[$index_user] = [ 'id' => $this->user->id ,'last_chat' => $this->user->last_chat];

        \Cache::put('users-online' , $idUsersOnline );
        
        return $idUsersOnline;
    }
}

?>