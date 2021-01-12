<?php

namespace App\Http\Controllers;

use App\Events\ShowLog;
use App\Exp;
use App\User;
use Illuminate\Http\Request;


class ExpController extends Controller
{
   


    public function showLog($idUser){

        $userExps= User::where('id',$idUser)->with('expsGotted','expsGiven')->get()[0];
        
        $expsGotted=ShowLog::dispatch($userExps->expsGotted,['userTo','userFrom'],'name');
        $expsGiven=ShowLog::dispatch($userExps->expsGiven,['userTo','userFrom'],'name');

        
        return view('internoLand.schedaUser.log.moneyOrExp',[
            
            'transactions' =>  array_merge($expsGotted[0],$expsGiven[0]),
            'userToView' => $userExps
        ]);

    }

}
