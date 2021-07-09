<?php

namespace App\Http\Controllers;

use App\Events\ChangeMap;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($idChat, Request $request)
    {
        $chat = \App\Chat::findOrFail($idChat);
        ChangeMap::dispatch(\Auth::user(),'chat',[$chat->id]);
        $nameRoute = strtolower(class_basename( $chat->map::class ));
        $parametres = $nameRoute == 'topmap' ? null : $chat->map->id;
       
        $newsRecently

        return view('internoLand.chat',[
            'errors' => $request->errors,
            'chat' => $chat,
            'route_to_get_back' => route($nameRoute,$parametres),
            'newsToShowOnTooltip' => $newsRecently

        ]);
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
    public function update(Request $request, $id)
    {
        //
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
