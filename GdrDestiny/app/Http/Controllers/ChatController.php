<?php

namespace App\Http\Controllers;

use App\Classes\ToolsHandler;
use App\Events\ChangeMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    use ToolsHandler;
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
        $nameRoute = strtolower(class_basename( $chat->map ));
        $parametres = $nameRoute == 'topmap' ? null : $chat->map->id;
        return view('internoLand.chat',[
            'errors' => $request->errors,
            'chat' => $chat,
            'route_to_get_back' => route($nameRoute,$parametres),
            'newsToShowOnTooltip' => $chat->news->first() ? $chat->news->first()->descrizione : '',
            'tools' => JSON_encode($this->getTools($request))

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
    public function update(Request $request, $chat)
    {
        $chat = \App\Chat::find($chat);
        if( !$chat ) return response()->json('chat doesn\'t find',404);

        $chat->descrizione = strip_tags($request->descrizione);
        $chat->save();
        
        if( !$request->has('immagini') ) return;
        $request->validate([
            'immagini.*' => 'nullable|mimes:jpg,png|max:2048',
        ]);
        foreach( $request->immagini as $key => $image)
        {
            $storage_path = 'public/homeinterna/images/chats/' . $chat->id . '/' . $key;
            $file_storaged = Storage::files($storage_path);
            // se è stata rimossa l'immagine elimino anche la copia in storage
            if( !$image ){ Storage::delete($file_storaged); continue; }

            //se invece voglio cambiare l'immagine elimino la vecchia
            if( !empty($file_storaged) ) Storage::delete($file_storaged);

            //inserisco la nuova immagine
            Storage::put($storage_path,$image);
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
