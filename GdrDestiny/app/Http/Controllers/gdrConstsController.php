<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gdrConstsController extends Controller
{
    public function showConstsMessages(){
        return json_encode(\Config::get('gdrConsts.messages'));

    }

    public function showConstsMeteo(){

        return json_encode(\Config::get('gdrConsts.meteo'));

    }
    public function showConstsChat(){

        return json_encode(\Config::get('gdrConsts.chat'));

    }
}
