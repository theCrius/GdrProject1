<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChangeUser;
use App\Events\UpdateDataUserPt1;
use App\Exp;
use Illuminate\Http\Request;
use App\User;
use App\Money;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function __construct(){

        //return $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  \Cache::get('users-online');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPresenti(Request $request)
    {
        $users = \Cache::get('users-online');
        return view('internoLand.presenti', [

            'usersonline' => $users,
            'errors' => $request->errors

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHurts($user,$hurtposition=null)
    {
        $userFound = User::find($user);
        $medicalRecords = $userFound->medicalrecords();
        if( $hurtposition ) $medicalRecords = $medicalRecords->where('hurtposition',strip_tags($hurtposition));

        if($userFound->isInCure->first())
        {
            $cureOfPg = $userFound->isInCure->first();
            $idOfMedicalRecordCured = [];
            foreach( $cureOfPg->medicalrecordsToDelete as $medicalrecord )
            {
                $idOfMedicalRecordCured[]= $medicalrecord['id'];
            }
            $medicalRecords = $medicalRecords->whereNotIn('id',$idOfMedicalRecordCured);
        }
        
        return $medicalRecords->with('userWhoAddHurt')->get();        
    }

    //display all skills about medicine
    public function skillCuraPg(Request $request)
    {
        $user = $request->user();
        $skillToReturn = [];
        $specsToReturn = [];
        $skills = $user->skills()->whereIn('name',array_keys(Config::get('gdrConsts.medicalStuffs.skills')))->get();

        foreach($skills as $skill)
        {
            $skillToReturn[] = array_merge(Config::get('gdrConsts.medicalStuffs.skills')[$skill->name], [ 'id' => $skill->id , 'name'  => $skill->name,'livello' => $skill->pivot->livello]);
        }
        $specs = $user->specs()->whereIn('name',array_keys(Config::get('gdrConsts.medicalStuffs.specs')))->get();

        foreach($specs as $spec)
        {
            $specsToReturn[]=  array_merge(Config::get('gdrConsts.medicalStuffs.specs')[$spec->name],['id' => $spec->id , 'name'  => $spec->name]);
        }
        return [
            'skills' => $skillToReturn,
            'specs' => $specsToReturn
        ];

            
    }

    /**
     * Show the value of a caratteristica of player
     *
     * @return \Illuminate\Http\Response
     */
    public function getCaratteristica($caratteristica, Request $request)
    {
        $user = $request->user();
        return $user[$caratteristica] + $user->breed[$caratteristica];
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
        $user= User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        return view('internoLand.schedaUser.schedaUser', [

            'userToView' => $user,
            'expsUser' => Exp::getSum($idUser),
            'users' => User::select('name')->get(),
            'money' => Money::getSum($idUser),
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
        
        if( !\Auth::user()->gestoreOrOwner($user)) return $this->returnBackWithError($request, 'Non puoi modificare le impostazione di questo utente' );
        
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


   public function showMedicalRecordsAll($idUser){

        return view('internoLand.schedaUser.log.medicalRecords',[

        ]);

   }

   //get all users registered
   public function allUsers(){

        $users = User::all();
        $usersToSend = [];

        foreach ($users as $user)
        {
            $usersToSend[] = [
                'name' => $user->name,
                'sesso' => $user->sesso,
                'razza' => [ 'name' => $user->breed->name , 'immagine' => $user->breed->immagini ],
                'emisfero' => [ 'name' => $user->hemispere->name , 'immagine' => $user->hemispere->immagini ],
                'classi' => $user->classes,
                'id' => $user->id
            ];
        }
        return json_encode( $usersToSend );

   }
   public function skillsAndSpecs(Request $request)
   {
       $user = $request->user();
       return response()->json(['skills' => $user->skills, 'specs' => $user->specs]);
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
        
        if($resultOfDeleting) return $this->returnBackWithError($request,json_encode($resultOfDeleting));
    }
}
