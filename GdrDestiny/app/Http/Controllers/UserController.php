<?php

namespace App\Http\Controllers;

use App\Events\ChangeUser;
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
        
        $this->saveDataPreSubmit($request);


        return view('internoLand.schedaUser.editUser.showOptionEditsUser',[
            'idUser' => $user->id
            ]);
    }

    public function editUser1($idUser, Request $request){
        $user=User::find($idUser);

        $this->saveDataPreSubmit($request, 'schedaPg/editUser/editUser1.js');

        return view('internoLand.schedaUser.editUser.editUser1',[
            'user' => $user,
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

        $ifReturnSomethingThereIsError = UpdateDataUserPt1::dispatch($request->all(),$user);

        if ( $ifReturnSomethingThereIsError[0] ) return $this->returnBackWithError($request,$ifReturnSomethingThereIsError[0]);


        $whatshowsInModal=[
            'routeName' => 'userProfile',
            'parametrs' => $idUser,
            'script' => 'schedaPg/userProfile.js'
        ];
        
        return $this->returnBack($request,null,$whatshowsInModal);
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUser,Request $request)
    {    
        $resultOfDeleting=ChangeUser::dispatch(User::find($idUser));
        
        if($resultOfDeleting) return $this->returnBackWithError($request,(string)$resultOfDeleting);
    }
}
