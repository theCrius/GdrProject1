<?php 
namespace App\Classes;

trait methodRole{

    //get roles of a user 
    public function getRole(){
        return \Config::get('roles.'.$this->role);

    }

    public function hasRole($role=null,$power=null)
    {
       
       $roleOfUser=$this->getRole();
        if(!$roleOfUser) throw new \Exception('Errore nella registrazione del ruolo utente');

        $powerRole=$roleOfUser['power'];

        if(is_array($power))
        {
            $powerRange=[
                'minimo' => $power[0],
                'massimo' => $power[1]
            ];
            $sameRole = ( $role['name'] ?? '' )  ==   $roleOfUser['name'] ;
            return $sameRole || ( $powerRole >= $powerRange['minimo'] && $powerRange['massimo'] >= $powerRole ); 
        }
        return $role['name'] == $roleOfUser['name'];
        
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
        return  ($this->id == $userToView->id) || $this->hasRole(\Config::get('roles.ROLE_GESTORE'),[4,5]);


    }

    public function isGestore(){

        return ( $this->hasRole(\Config::get('roles.ROLE_GESTORE') ) );

    }

    public function isMaster()
    {
        return ( $this->hasRole(\Config::get('roles.ROLE_MASTER') ,  [3,5]) ) ;
    }

   //to check if the user is moderatore off or admin or gestore 
   public function modOffAdminOrGestore()
   {
       return $this->hasRole(\Config::get('roles.ROLE_MODERATORE_OFF')) || $this->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5]);
   }

   public function modOnMasterAdminOrGestore()
   {
       return $this->hasRole(\Config::get('roles.ROLE_MODERATORE_ON')) || $this->hasRole(\Config::get('roles.ROLE_MASTER'),[3,5]);
   }
   


}
?>