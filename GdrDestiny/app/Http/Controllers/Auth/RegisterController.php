<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

            $breeds=\App\Breed::select($toselect)->get();
            return view('auth.register-principal',[
                'breeds' => $breeds
            ]);
    
    }
    public function secondoStep($id_razza){
        $hemisperes=\App\Hemispere::select('name','id','descrizione')->get();
        return view('auth.register-secondary',[
            'razza' => $id_razza,
            'hemisperes' => $hemisperes
    

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
            'Sesso' => $sesso
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
        dd($data);
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'nazionalità' => ['required', 'string', 'max:255'],
            'razza' => ['required', 'int'],
            'emisfero' => ['required','int'],
            'sesso' => ['required','string',':max:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
