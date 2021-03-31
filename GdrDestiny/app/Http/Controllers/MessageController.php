<?php

namespace App\Http\Controllers;

use App\Events\ShowLog;
use App\Events\showMessages;
use App\Message;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MessageController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idUser,Request $request)
    {

        try{
            
            $idUserTo=\App\User::select('id')->where('name',\htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $request->name)))->get()[0]->id;
            $text= \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $request->text));
            $titleMessage =\htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $request->objectEmail));
            
            if( strlen($text) > Config::get('gdrConsts.messages.max_length_message') ) throw new \Exception(Config::get('gdrConsts.messages.error.message'));
            if( strlen($titleMessage) > Config::get('gdrConsts.messages.max_length_title') ) throw new \Exception(Config::get('gdrConsts.messages.error.title'));
            
            \App\Message::create([

                'id_user_from' => $idUser,
                'id_user_to' => $idUserTo,
                'message' => $text,
                'title' => $titleMessage,
                'letto' => 'no',
                'deleted' => 'no',

            ]);

        }catch(Exception $e){

            return $this->returnBackWithError($request,$e->getMessage());

        }


        $whatshowsInModal1=[
            'routeName' => 'userProfile',
            'parametrs' => $idUser,
            'scriptName' => 'schedaPg/userProfile.js'
        ];
        
        return $this->returnBack($request,null,$whatshowsInModal1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function showLog($idUser)
    {
        $userMessages = User::findOrFail($idUser);

        $messagesGotted=ShowLog::dispatch($userMessages->messagesGotted,['userTo','userFrom'],'name');
        $messagesGiven=ShowLog::dispatch($userMessages->messagesGiven,['userTo','userFrom'],'name');
        
        return view('internoLand.schedaUser.log.messagesLog',[
            
            'messages' => array_merge($messagesGiven[0],$messagesGotted[0]),
            'userToView' => $userMessages
            
            ]);
    }

    public function show($idUser){

        $userMessages = User::findOrFail($idUser);
        
        $messagesGotted= showMessages::dispatch($userMessages->messagesGotted->where('deleted','no'),['userTo','userFrom'],'name');
        
        return json_encode($messagesGotted[0]);

        


    }

    public function showNewMessages($idUser){

        $userMessages = User::findOrFail($idUser);

        
        $messagesGotted= showMessages::dispatch($userMessages->messagesGotted->where('deleted','no')->where('letto','no'),['userTo','userFrom'],'name');
        
        return json_encode($messagesGotted[0]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        try{
            
            $message = Message::findOrFail($request->id);

            $message->letto = $request->data;
    
            $message->save();
            
        }catch(Exception $e){

            return response()->json($e->getMessage());
        } 

        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $messagesToDelete = Message::whereIn('id',$request->messages)->get();

        foreach( $messagesToDelete as $message ){

            if( $request->user()->id != $message->id_user_to ) abort(response()->json('Unauthorized', 403));
            
            $message->deleted = 'si';

            $message->save();

        }

        
        
    }
}
