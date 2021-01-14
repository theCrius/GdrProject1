<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserloggedLogController extends Controller
{
    public function show($idUser){

        $userLogs=\App\User::findOrFail($idUser)->logs;
        
        return view('internoLand.schedaUser.log.userloggedlogs',[
            'logs' => $userLogs
        ]);

    }
}
