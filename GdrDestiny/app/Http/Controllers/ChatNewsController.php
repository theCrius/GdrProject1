<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Chatnews;
use Illuminate\Http\Request;

class ChatNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($chat, Request $request)
    {
        // route pass id and i get info
        $chat = Chat::find($chat);
        if ( !$chat ) return response()->json('chat not found',500);
        $descrizione = \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\ ']/", '', $request->description));

        if ( !$descrizione ) return response()->json('insert description of news', 500);

        $newChat = \App\Chatnews::create([
            'id_user' => $request->user()->id,
            'id_chat' => $chat->id,
            'descrizione' => $descrizione

        ]);

        return response()->json(\App\Chatnews::where('id',$newChat->id)->with('user')->first());

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
    public function destroy($news)
    {
        $news = Chatnews::find($news);
        $news->delete();
        return $news;
    }
}
