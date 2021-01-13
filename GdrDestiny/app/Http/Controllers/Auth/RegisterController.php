<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\GuidaController;
use Illuminate\Support\Facades\Mail;
use App\Mail\newUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //$tokenExpMoneyPlus works when there is a change user
    public function primoStep($token=null){

            $textModal=GuidaController::getSpecifData('Regolamento/RegolamentoON','razze');

            
           return view('auth.register-principal',[
                'textModal' => $textModal,
                'token' => $token
            ]);
    
    }
    public function secondoStep($id_razza,$token=null){
        $textModal=GuidaController::getSpecifData('Regolamento/RegolamentoON','emisferi');
        
        return view('auth.register-secondary',[
            'razza' => $id_razza,
            'textModal' => $textModal,
            'token' => $token,
    

        ]);
    }
    public function terzoStep($id_razza,$id_emisfero,$token=null){
        return view('auth.register-third',[
            'RazzaId' => $id_razza,
            'EmisferoId' => $id_emisfero,
            'token' => $token
        ]);

    }
    public function quartoStep($id_razza,$id_emisfero,$sesso,$token=null){
        
        return view('auth.last-register',[
            'RazzaId' => $id_razza,
            'EmisferoId' => $id_emisfero,
            'Sesso' => $sesso,
            'statiOptions' => explode("\n",GuidaController::getSpecifData('','stati')),
            'textModal' => GuidaController::getSpecifData('','avvertenza'),
            'token' => $token
        ]);
    }


    public function addExpMoney($id,$token){

        try{
            $userResetInfo=\App\Resetuser::where('codice',$token)->get()[0];

            \App\Money::create([
                'id_user_to' => $id,
                'motivo' => 'recupero vecchio Pg',
                'soldi' => $userResetInfo->money
            ]);

            \App\Exp::create([
                'id_user_to' => $id,
                'motivazione' => 'recupero vecchio Pg',
                'exp_dati' => (3/4 * $userResetInfo->exp)
            ]);

            $userResetInfo->delete();

        }catch(\Exception $e){

            return $e->getMessage();

        }


    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'cognome' => ['required', 'string', 'max:255'],
            'nazionalità' => ['required', 'string', 'max:255'],
            'razza' => ['required', 'string','max:1'],
            'emisfero' => ['required','string','max:1'],
            'sesso' => ['required','string',':max:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'token' => ['nullable','exists:resetusers,codice']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $limitRazze= \App\Breed::all()->count();
        $limitEmisfero= \App\Hemispere::all()->count();
        $email=\htmlspecialchars(preg_replace("/[^A-Za-z0-9@\-\.\']/", '', $data['email']));
        $name=\htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $data['name']));
        $password=\Str::random(8);

        Mail::to($email)->send(new NewUser($name,$password));
       
        $newUser=User::create([
            'name' => $name,
            'surname' => \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $data['cognome'])),
            'nazionalità' => \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $data['nazionalità'])),
            'id_razza' => \htmlspecialchars(preg_replace("/[^0-". $limitRazze ."\-\']/", '1', $data['razza'])),
            'email' => $email,
            'id_emisfero' => \htmlspecialchars(preg_replace("/[^0-". $limitEmisfero ."\-\']/", '1', $data['emisfero'])),
            'sesso' => $data['sesso'] === 'f' || $data['sesso'] === 'm' ? $data['sesso'] : 'm',
            'password' => Hash::make($password),
            'last_activity' => now()

            

        ]);
       
        if($data['token']) $this->addExpMoney($newUser->id,$data['token']);
            
        return $newUser;
    }
}
