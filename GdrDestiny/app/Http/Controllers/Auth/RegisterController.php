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

    public function primoStep(){
            $toselect=[
                'id',
                'name',
                'forza',
                'destrezza',
                'resistenza',
                'prontezza',
                'percezione',
                'intelligenza',
                'punti_mente',
                'punti_corpo',
                'descrizione',
            ];

            $textModal=GuidaController::getSpecifData('Regolamento/RegolamentoON','razze');
           
            $breeds=\App\Breed::select($toselect)->get();
            return view('auth.register-principal',[
                'breeds' => $breeds,
                'textModal' => $textModal
            ]);
    
    }
    public function secondoStep($id_razza){
        $hemisperes=\App\Hemispere::select('name','id','descrizione')->get();
        $textModal=GuidaController::getSpecifData('Regolamento/RegolamentoON','emisferi');
        return view('auth.register-secondary',[
            'razza' => $id_razza,
            'hemisperes' => $hemisperes,
            'textModal' => $textModal
    

        ]);
    }
    public function terzoStep($id_razza,$id_emisfero){
        return view('auth.register-third',[
            'RazzaId' => $id_razza,
            'EmisferoId' => $id_emisfero
        ]);

    }
    public function quartoStep($id_razza,$id_emisfero,$sesso){
        
        return view('auth.last-register',[
            'RazzaId' => $id_razza,
            'EmisferoId' => $id_emisfero,
            'Sesso' => $sesso,
            'statiOptions' => explode("\n",GuidaController::getSpecifData('','stati')),
            'textModal' => GuidaController::getSpecifData('','avvertenza')
        ]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
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
        return User::create([
            'name' => $name,
            'surname' => \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $data['cognome'])),
            'nazionalità' => \htmlspecialchars(preg_replace("/[^A-Za-z0-9\-\']/", '', $data['nazionalità'])),
            'id_razza' => \htmlspecialchars(preg_replace("/[^0-". $limitRazze ."\-\']/", '1', $data['razza'])),
            'email' => $email,
            'id_emisfero' => \htmlspecialchars(preg_replace("/[^0-". $limitEmisfero ."\-\']/", '1', $data['emisfero'])),
            'sesso' => $data['sesso'] === 'f' || $data['sesso'] === 'm' ? $data['sesso'] : 'm',
            'password' => Hash::make($password),
            'indirizzo_ip' => \Request::ip(),
            'last_activity' => now()

            

        ]);
    }
}
