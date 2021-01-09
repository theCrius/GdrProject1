<?php
namespace App\Classes;

trait ErrorHandle{

        public function returnBackWithError($request,String $message){
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

        
        
        
            
        
        return redirect()->route(\Auth::user()->last_chat,["errors" => $request->errors]) ;
    }

        public function returnBack($request,String $whereToGo=null,Array $WhatShowsInModal=null){
            
            $request->errors=[
                'routeName' => $WhatShowsInModal['routeName'] ?? $request->session()->get('last-position:View'),
                'parametrs' => $WhatShowsInModal['parametrs'] ?? $request->session()->get('last-position:RouteParams'),
                'scriptName' => $WhatShowsInModal['script'] ?? $request->session()->get('last-position:ScriptName')
            ];

            if(!$whereToGo) $whereToGo = $request->session()->get('last-position:Chat');
            return redirect()->route(\Auth::user()->last_chat,['errors' => $request->errors]);
        }


    public function saveDataPreSubmit($request,String $scripName=null){
    

        $request->session()->put('last-position:RouteParams',$request->route()->parameters());
        $request->session()->put('last-position:View',$request->route()->getName());
        if($scripName) $request->session()->put('last-position:ScriptName',$scripName);
        
    }



}

















?>