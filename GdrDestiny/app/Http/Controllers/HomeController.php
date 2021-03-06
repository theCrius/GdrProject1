<?php

namespace App\Http\Controllers;


use App\Topmap;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       $map = Topmap::find(1);
       
        return view('internoLand.map',
        [
            'errors' => $request->errors,
            'map' => $map,
            'chats' => $map->chats,
            'mapchilds' => $map->middlemaps
        ]
    );
    }
}
