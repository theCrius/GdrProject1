<?php 
namespace App\Classes;

use App\Medicalrecord;
use App\Message;
use App\Userisincure;
use App\Userloggedlog;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Cast\String_;

trait Schedule{

    public function deleteMessageUnread($schedule){

        return $schedule->call(
            function(){

                Message::where('letto','no')->delete();
                
            }
        )->cron('0 0 1 */6 *'); //every 6 months
        

    }

    public function deleteMessageRead($schedule){

        return $schedule->call(
            function(){

                Message::where('letto','si')->delete();
                
            }
        )->cron('0 0 1 */6 *'); //every 6 months

    }

    public function deleteuserLoggedLog($schedule){

        return $schedule->call(
            function(){

                Userloggedlog::all()->delete();
                
            }
        )->cron('0 0 1 */6 *'); //every 6 months
        

    }

}



?>