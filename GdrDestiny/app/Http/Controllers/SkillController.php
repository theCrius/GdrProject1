<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
   public function show(Request $request){
       return view('internoLand.schedaUser.showSkill',[
        'errors' => $request->error,
       ]);
   } 
}
