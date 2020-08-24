<?php 
namespace App\Roles;

trait methodRole{

    //get roles of a user 
    public function getRole(){
        if(!$this->role) return 'utente';
        return \Config::get('roles.'.$this->role);

    }

    public function hasRole(array $role, int $power=0){

        $roleOfUser=$this->getRole();
        if(!$roleOfUser) throw new Exception('Errore nella registrazione del ruolo utente');

        $powerRole=$roleOfUser['power'];
        $nameRole=$roleOfUser['name'];
        
        return $nameRole === $role['name'] && $powerRole > $power; 
        
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




}
?>