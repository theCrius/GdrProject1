<?php

namespace App\Listeners;

use App\Events\UpdateDataUserPt1;
use App\Usermecha;
use Error;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PharIo\Manifest\Email;
use App\Notifications\ChangeEmail;

class SendUpdataDataToCheckAndToDb
{
   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->extensionsImage = [
            '.jpg' , '.gif' , '.png' , '.jpeg'
        ];
    }

    public function imageUrlIsCorrect(string $url){

         return \Str::contains($url, $this->extensionsImage);

    }

    /**
     * Handle the event.
     *
     * @param  UpdateDataUserPt1  $event
     * @return void
     */
    public function handle(UpdateDataUserPt1 $event)
    {
        try{

        foreach ( $event->dataToCheck as $key => $data ){

            //html is trasformed and space is deleted
            $dataSanitized=htmlspecialchars(trim($data));

            if( $key === 'immagine_mecha' ){
                
                if( !$this->imageUrlIsCorrect($dataSanitized) ) {

                    throw new Exception('Errore link immagine, deve terminare con .gif .jpeg . jpg .png');

                }

                if ( !$event->user->mecha ) throw new Exception('Mecha non presente');

                $event->user->mecha->immagine = $dataSanitized;
                $event->user->mecha->save();


            }else if( $key == 'email' ){

                $this->user->notify(new ChangeEmail($dataSanitized,$event->user->email,$event->user->name));

            }
            

        }
        }catch(\Exception $e){
            
            dd($e->getMessage());
        }
    }


 
}
