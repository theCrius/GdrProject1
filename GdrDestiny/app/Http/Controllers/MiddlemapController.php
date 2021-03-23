<?php

namespace App\Http\Controllers;

use App\Events\ChangeMap;
use App\Middlemap;
use Exception;
use Illuminate\Http\Request;

class MiddlemapController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $idMiddlemap)
    {
       $map = Middlemap::findorFail($idMiddlemap);

       ChangeMap::dispatch(\Auth::user(),'middlemap',[$map->id]);

        return view('internoLand.submap',
        [
            'errors' => $request->errors,
            'map' => $map,
            'chats' => $map->chats,
            'mapchilds' => $map->bottommaps
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTopmap){

        try{
            
            $map = Middlemap::findOrFail($idTopmap);
            $map->meteo = $request->meteo;
            $map->save();


        }catch(Exception $e){

            return response()->json($e->getMessage(),404);
        
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
