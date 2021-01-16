<?php

namespace App\Http\Controllers;

use App\Events\ShowLog;
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
            
            if( strlen($text) > Config::get('gdrConsts.messages.max_length_messages') ) throw new \Exception(Config::get('gdrConsts.messages.error'));
            
            \App\Message::insert([

                'id_user_from' => $idUser,
                'id_user_to' => $idUserTo,
                'message' => $text,
                'title' => $titleMessage,
                'letto' => 'no'

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
    public function show($idUser)
    {
        $userMessages = User::findOrFail($idUser);

        $messagesGotted=ShowLog::dispatch($userMessages->messagesGotted,['userTo','userFrom'],'name');
        $messagesGiven=ShowLog::dispatch($userMessages->messagesGiven,['userTo','userFrom'],'name');
        
        return view('internoLand.schedaUser.log.messagesLog',[
            
            'messages' => array_merge($messagesGiven[0],$messagesGotted[0]),
            'userToView' => $userMessages
            
            ]);
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
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
