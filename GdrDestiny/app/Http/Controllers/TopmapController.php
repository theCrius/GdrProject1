<?php

namespace App\Http\Controllers;

use App\Classes\Meteo;
use App\Events\ChangeMap;
use App\Topmap;
use Exception;
use Illuminate\Http\Request;

class TopmapController extends Controller
{
    use Meteo;
    public function index(Request $request)
    {
       $map = Topmap::find(1);

       ChangeMap::dispatch(\Auth::user(),'home',[$map->id]);

        return view('internoLand.topmap',
        [
            'errors' => $request->errors,
            'map' => $map,
            'chats' => $map->chats,
            'mapchilds' => $map->middlemaps
        ]
    );
    }

    public function showMeteo($idTopmap){
        
        return $this->show_meteo_info('App\Topmap',$idTopmap);

    }

    public function update(Request $request, $idTopmap){

        try{
            
            $map = Topmap::findOrFail($idTopmap);
            $map->meteo = $request->meteo;
            $map->save();


        }catch(Exception $e){

            return response()->json($e->getMessage(),404);
        
        }
        
    }
}
