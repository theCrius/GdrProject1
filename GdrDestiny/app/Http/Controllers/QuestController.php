<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Quest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class QuestController extends Controller
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
    public function store($chat, Request $request)
    {
        $chat = Chat::find($chat);
        $request->validate([
            'name' => 'required|string'
        ]);
        return Quest::create([
            'name' => strip_tags($request->name),
            'id_user' => $request->user()->id,
            'id_chat' => $chat->id,
            'started' => Carbon::now(),
            'finished' => null
        ]);
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
    public function update($chat,$quest)
    {
        $questFound = Chat::find($chat)->quest->first();

        if( $questFound->id != $quest ) abort(402);

        if( Carbon::parse($questFound->started)->diffInMinutes(Carbon::now()) < Config::get('gdrConsts.quest.interval_between_open_close') ) return $questFound->delete();

        $questFound->finished = Carbon::now();
        $questFound->save();
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
