<?php

namespace App\Http\Controllers;


use App\Events\ChangeMap;
use App\Topmap;
use Illuminate\Http\Request;

class TopmapController extends Controller
{
   
    public function index(Request $request)
    {
       $map = Topmap::find(1);

       ChangeMap::dispatch(\Auth::user(),'topmap',[$map->id]);

        return view('internoLand.topmap',
        [
            'errors' => $request->errors,
            'map' => $map,
            'chats' => $map->chats,
            'mapchilds' => $map->middlemaps
        ]
    );
    }

    
}
