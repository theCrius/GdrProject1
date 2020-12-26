<?php

namespace App\Http\Controllers;

use App\Message;
use Exception;
use Illuminate\Http\Request;

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
            
            \App\Message::insert([

                'id_user_from' => $idUser,
                'id_user_to' => $idUserTo,
                'message' => $text,
                'title' => $titleMessage,
                'letto' => 'no'

            ]);

        }catch(Exception $e){

            return $this->returnBackWithError($request,'Qualcosa è andato storto');

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
    public function show(Message $message)
    {
        //
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
