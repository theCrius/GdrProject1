<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gdrConstsController extends Controller
{
    public function showConstsMessages(){
        dd(request()->user());
        return json_encode(\Config::get('gdrConsts.messages'));

    }

    public function showConstsMeteo(){

        return json_encode(\Config::get('gdrConsts.meteo'));

    }
}
