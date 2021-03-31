<?php 
namespace App\Classes;

trait methodRole{

    //get roles of a user 
    public function getRole(){
        return \Config::get('roles.'.$this->role);

    }

    public function hasRole($role=null,$power=null){
       
       $roleOfUser=$this->getRole();
        
        if(!$roleOfUser) throw new \Exception('Errore nella registrazione del ruolo utente');

        $powerRole=$roleOfUser['power'];
        $nameRole=$roleOfUser['name'];

        if(is_array($power)){
            $powerRange=[
                'minimo' => $power[0],
                'massimo' => $power[1]
            ];
             return $nameRole === $role['name'] && $powerRole > $powerRange['minimo'] && $powerRange['massimo'] > $powerRole; 
        }

        return $nameRole === $role['name'];
        
        
    }

    private function setRole($role){
         $this->role=$role;
         $this->save();
         return $this;
    }

    public function addRole($role){
        
        if(! in_array($role,\Config::get('roles'))) $role=null;
    
        return  $this->setRole($role);
    }

    //Can do it if you are an admin or the owner
    public function gestoreOrOwner($userToView){

        return  ($this->id == $userToView->id) || $this->hasRole(\Config::get('roles.ROLE_GESTORE',[4,5]));


    }

    public function isGestore($userToView){

        return ( $this->hasRole(\Config::get('roles.ROLE_GESTORE') ) );

    }



}
?>