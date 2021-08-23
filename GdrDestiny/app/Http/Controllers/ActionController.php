<?php

namespace App\Http\Controllers;

use App\Action;
use App\Classes\ActionHandler;
use App\Events\NewActionSent;
use App\Events\NewSussurriSent;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ActionController extends Controller
{
    use ActionHandler;
    public function __construct()
    {

    }
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
    public function store(Request $request, $idChat)
    {   
        $user = $request->user();
        if( $request->action['symbol'] == 'fato' &&  !$request->user()->isMaster() )
        {
            $symbol_edited = 'action';
        }

        if( $request->action['symbol'] == 'dadi')
        {
            $action =[ 
                'attributo' =>['level' => $user->breed[strtolower($request->action['attributo'])],'name' => $request->action['attributo']], 
                'skillOrSpec' => $request->action['skillOrSpec'] ? $user[$request->action['skillOrSpec']['classToCall']]->find($request->action['skillOrSpec']['id']) : null,
                'dado' => $request->action['dado']
            ];
        }
        $symbol = $symbol_edited ?? $request->action['symbol'];
        try{
            $newAction = Action::create([
                'id_user' => $user->id,
                'text_sent'=>  $this->cleanTextToSend( $request->action['action'] ?? $action , \Config::get('gdrConsts.chat.symbols')[$symbol],$symbol) ,
                'typology' => $symbol,
                'id_chat' => $idChat,
                'id_quest' => null,
                'id_user_receive' => $request->has('action.nameUser') ? $request->action['nameUser'] : null //se non trova il nome dell'utente mette null
            ]);

        }catch(Exception $e){

            return $e->getMessage();
        }
        if ($newAction->typology == 'action' || $newAction->typology == 'fato')
        {
            \App\Money::add(\Config::get('gdrConsts.chat.action.money_got'),null,$newAction->id_user,'Azione in chat');
            \App\Exp::add( \Config::get('gdrConsts.chat.action.exp_got'),null,$newAction->id_user,'Azione in chat');
        }

        if( $newAction->typology == 'sussurri' )
        {
            event( new NewSussurriSent($newAction));
        }else{
            broadcast(new NewActionSent($newAction));
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idChat)
    {
        $hours = \Config::get('gdrConsts.chat.action.max_hours');
        return Action::where('id_chat',$idChat)->where('created_at','>',Carbon::now()->subHours($hours))->get();
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
