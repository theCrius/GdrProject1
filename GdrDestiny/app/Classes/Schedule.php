<?php 
namespace App\Classes;

use App\Message;
use App\Userloggedlog;

trait Schedule{

    public function deleteMessageUnread($schedule){

        return $schedule->call(
            function(){

                Message::where('letto','no')->delete();
                
            }
        )->eachSixMonths();
        

    }

    public function deleteMessageRead($schedule){

        return $schedule->call(
            function(){

                Message::where('letto','si')->delete();
                
            }
        )->eachSixMonths();

    }

    public function deleteuserLoggedLog($schedule){

        return $schedule->call(
            function(){

                Userloggedlog::all()->delete();
                
            }
        )->eachSixMonths();
        

    }

}



?>