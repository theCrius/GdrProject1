<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnBackWithError(Request $request,String $message){
        $routeToReturn=$request->session()->get('last-position:View');
    
        
        $datasToReSendBack=$request->session()->get('last-position:RouteParams');
        
        if(!$routeToReturn){

            $routeToReturn= 'userProfile';
            $datasToReSendBack[]=\Auth::id();
        }
        
        $request->errors=[
            'message' => \Crypt::encrypt($message),
            
        ];
        $datasToReSendBack['errors']=$request->errors;
        $request->errors=[ 
            'routeName' => $routeToReturn,
            'parametrs' => $datasToReSendBack,
            'scriptName' => $request->session()->get('last-position:ScriptName')
        ];

       
     
    
        
    
    return redirect()->route($request->session()->get('last-position:Chat'),["errors" => $request->errors]) ;
}

    public function returnBack(Request $request,String $whereToGo=null,Array $WhatShowsInModal=null){
        
        $request->errors=[
            'routeName' => $WhatShowsInModal['routeName'] ?? $request->session()->get('last-position:View'),
            'parametrs' => $WhatShowsInModal['parametrs'] ?? $request->session()->get('last-position:RouteParams'),
        ];
        if(!$whereToGo) $whereToGo = $request->session()->get('last-position:Chat');
        return redirect()->route($whereToGo,['errors' => $request->errors]);
    }


public function saveDataPreSubmit(Request $request,String $scripName=null,\App\User $user=null){
  

    $request->session()->flash('last-position:RouteParams',$request->route()->parameters());
    $request->session()->flash('last-position:Chat',$user->last_chat ?? \Auth::user()->last_chat);
    $request->session()->flash('last-position:View',$request->route()->getName());
    if($scripName) $request->session()->flash('last-position:ScriptName',$scripName);
}

}