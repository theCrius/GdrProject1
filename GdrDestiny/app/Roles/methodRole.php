<?php 
namespace App\Roles;

trait methodRole{

    //get roles of a user 
    public function getRole(){
        return $this->role ?? 'utente';

    }

    public function hasRole(string $role){
        
        $roleOfUser=$this->getRole();
        
        return $roleOfUser === $role; 
        
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