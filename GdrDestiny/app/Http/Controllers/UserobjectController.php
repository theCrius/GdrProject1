<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes\Objects;
use Exception;

class UserobjectController extends Controller 
{



    public function showObjectEquipped($idUser,Request $request){
        $user=\App\User::find($idUser);

        $this->saveDataPreSubmit($request);
        return view('internoLand.schedaUser.showEquippedObject',[
            'userView' => \Auth::user(),
            'userToView' => $user,
            'objectsEquipped' => $user->objectsEquipped('yes')
        ]);
    }

    public function showObjectOwned($idUser,Request $request){
        $user=\App\User::find($idUser);
        $this->saveDataPreSubmit($request);
        return view('internoLand.schedaUser.showOwnedObject',[
            'userView' => \Auth::user(),
            'userToView' => $user,
            'objectsOwned' => $user->objectsEquipped('no')
        ]);
    }

    public function equipsOrUnequips($idUser,$idObject,Request $request){
        $user= \App\User::find($idUser);

        //se non sei l'utente stesso non puoi modificare lo status di equip
        if($user->id !== \Auth::id()) return $this->returnBackWithError($request,'Non hai i permessi per equipaggiare l\'oggetto');

        $objectFinding=$user->objects->find($idObject);

        //se l'utente non possiede l'oggetto
        if( !$objectFinding ) return $this->returnBackWithError($request,"Mi dispiace ma possiedi l'oggetto");
        
        try{
            //enum of table in \App\Userobject 
            $twoOptions= [
                'yes' => 'yes',
                'no' => 'no'
            ];

            if($objectFinding->equipped == $twoOptions['yes'])
            {
                $objectFinding->equipped = $twoOptions['no'];

            }else{

                $objectFinding->equipped = $twoOptions['yes'];
            }

            $objectFinding->save();

        }catch(Exception $e){

            return $this->returnBackWithError($request,$e->getMessage());

        }

        $whatshowsInModal=[
            'routeName' => 'objectOwned',
            'parametrs' => $idUser,
            'scriptName' => 'schedaPg/userProfile.js'
        ];

        return $this->returnBack($request,null,$whatshowsInModal);
    }
}
