<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gdrConstsController extends Controller
{
    public function showConstsMessages(){

        return json_encode(\Config::get('gdrConsts.messages'));

    }
}