<?php

namespace App\Http\Controllers;

use App\Events\UpdateDataUserPt1;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){

        return $this->middleware('auth');

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
    public function show($idUser, Request $request)
    {
        $this->saveDataPreSubmit($request,'schedaPg/userProfile.js');

        return view('internoLand.schedaUser.schedaUser', [

            'userToView' => User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0],
            'expsUser' => ExpController::getSumOfExp($idUser),
            'users' => User::select('name')->get(),
            'errors' => $request->errors,
            'userView' => \Auth::user(),
            'points' => MedicalrecordController::getPoints($idUser)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOptionEditsUser($idUser, Request $request)
    {
        $user= User::find($idUser);
        if($user->id !== \Auth::id() && !$user->hasRole(\Config::get('roles.ROLE_GESTORE'),[4,5])) return $this->returnBackWithError($request, 'Non puoi modificare le impostazione di questo utente' );

        return view('internoLand.schedaUser.editUser.showOptionEditsUser',[
            'idUser' => $user->id
            ]);
    }

    public function editUser1($idUser){
        $user=User::find($idUser);

        return view('internoLand.schedaUser.editUser.editUser1',[
            'user' => $user,
        ]);
    }

    public function editUser2($idUser){
        return view('internoLand.schedaUser.editUser.editUser2',[
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser1($idUser,Request $request)
    {
        $user=User::find($idUser);

        UpdateDataUserPt1::dispatch($request->all(),$user);

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
