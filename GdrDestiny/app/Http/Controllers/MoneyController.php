<?php

namespace App\Http\Controllers;

use App\Events\ShowLog;
use Illuminate\Http\Request;

class MoneyController extends Controller
{

    public function showLog($idUser){

        $userMoney= \App\User::where('id',$idUser)->with('moneyGotted','moneyGiven')->get()[0];
        
        $moneyGotted=ShowLog::dispatch($userMoney->moneyGotted,['userTo','userFrom'],'name');
        $moneyGiven=ShowLog::dispatch($userMoney->moneyGiven,['userTo','userFrom'],'name');

        
        return view('internoLand.schedaUser.log.moneyOrExp',[
            'transactions' =>  array_merge($moneyGotted[0],$moneyGiven[0]),
            'userToView' => $userMoney
        ]);
        }
}
