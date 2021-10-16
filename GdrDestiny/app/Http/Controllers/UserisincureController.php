<?php

namespace App\Http\Controllers;

use App\Jobs\CureFinished;
use App\User;
use App\Userisincure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserisincureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('name','id')->get();
        $userHurtedAndNotInCure = [];
        foreach( $users as $user)
        {
            if( !$user->medicalrecords->first() ) continue;
            if( $user->isInCure->first() ) continue;

            $userHurtedAndNotInCure[] = $user;
            
        }
        return $userHurtedAndNotInCure;
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
    public function store($user,Request $request)
    {
        $request->validate([
            'dateWhenHurtAreDeleted' => 'integer|required|min:0',
            'howMuchPointsCanGetFromSkillOrSpec' => 'integer|required|min:0',
            'medicalrecordsToDelete' => 'required',
            'medicalrecordsToDelete.*.id' => 'exists:medicalrecords'
        ]);
        $user = User::find($user);
        $cure = Userisincure::create(
            [
                'doctor' => $request->user()->id,
                'patient' => $user->id,
                'start_cure' => now(),
                'finish_cure' => Carbon::today()->addDays($request->dateWhenHurtAreDeleted),
                'point_recupered_at_day' => $request->howMuchPointsCanGetFromSkillOrSpec,
                'medicalrecordsToDelete' => $request->medicalrecordsToDelete

            ]
        );
        CureFinished::dispatch($cure)->delay($cure->finish_cure);
        return $cure;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userisincure  $userisincure
     * @return \Illuminate\Http\Response
     */
    public function show(Userisincure $userisincure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userisincure  $userisincure
     * @return \Illuminate\Http\Response
     */
    public function edit(Userisincure $userisincure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userisincure  $userisincure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userisincure $userisincure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userisincure  $userisincure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userisincure $userisincure)
    {
        //
    }
}
