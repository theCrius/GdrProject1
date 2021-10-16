<?php

namespace App\Http\Controllers;

use App\Medicalrecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MedicalrecordController extends Controller
{
    //se un personaggio è in cura , allora riceverà degli aumenti giornalieri solo sul front end, viene fatta la suddivisione tra punti corpo e mentali, se ci sono ferite relative ai punti corpo aumenta una variabile che rappresenta i giorni da scalare(se n ci ritroveremmo con più punti corpo e meno punti mentali) e poi la stessa variabile è usata per far aumentare i puntisanità
    public static function checkCure($user,&$punticorpo, &$puntimentali)
    {
        $curesOfPg = $user->isInCure->first();

        if ( !$curesOfPg ) return ;

        $pointrecuperedAtDay = $curesOfPg->point_recupered_at_day;
        $dayToRemove = 0;
        foreach( $curesOfPg->medicalrecordsToDelete as $medicalrecord )
        {
            if( $medicalrecord['hurtposition'] == 'sanitamentale')
            {
                $recordAboutSanitaMentale = Medicalrecord::find($medicalrecord['id']);
                $dayToRemove += round( abs( $recordAboutSanitaMentale->danno / $pointrecuperedAtDay )) ;
            }
        }
        $punticorpo += ( ( Carbon::now()->diffInDays($curesOfPg->start_cure) - $dayToRemove ) * $pointrecuperedAtDay );
        $puntimentali +=  ( Carbon::now()->diffInDays($curesOfPg->start_cure)  * $pointrecuperedAtDay ) ;

        //se superano le soglie allora mettiamo direttamente il massimo
       $punticorpo = ( $punticorpo > $user->breed->punti_corpo) ? $user->breed->punti_corpo : $punticorpo;
       $puntimentali = ($puntimentali > $user->breed->punti_mente) ? $user->breed->punti_mente : $puntimentali;
    }
    
    public static function getPoints($idUser){
        $hurtsum=0;
        $sanitamentaleSum=0;
        
        $user=\App\User::where('id',$idUser)->with('medicalrecords','breed','isInCure')->get()[0];

        foreach($user->medicalrecords as $hurt){
            if($hurt['hurtposition'] == 'sanitamentale') { $sanitamentaleSum+=$hurt['danno']; continue; }
            $hurtsum+=$hurt['danno'];
        }
        $punticorpo = ( $user->breed->punti_corpo + $hurtsum );
        $puntimentali= ( $user->breed->punti_mente + $sanitamentaleSum );

        //with the address , so the variables'll change
        Self::checkCure($user,$punticorpo,$puntimentali);
        
        return [
            'punticorpo' => $punticorpo,
            'percentualePunticorpo' => round(  ( $punticorpo / $user->breed->punti_corpo  )  , 1 , PHP_ROUND_HALF_DOWN) * 100,
            'percentualePuntimentali' => round( (  $puntimentali / $user->breed->punti_mente  ) , 1 , PHP_ROUND_HALF_DOWN) * 100,
            'puntimentali' => $puntimentali
        ];
    }

    

    public static function getMedicalRecords(\App\User $user){
    
        $medicalrecordsOrdered = [
            'top' => [],
            'bottom' => [],
            'middle' => []
        ];
        foreach($user->medicalrecords as $medicalrecord){
           if($medicalrecord->hurtposition === 'top' || $medicalrecord->hurtposition === 'sanitamentale'){
            //the unity of measure    
            $psOrsm= ($medicalrecord->hurtposition === 'top') ? 'pc' : 'pm';

               $medicalrecordsOrdered['top'][]=[
                   'descrizione' => $medicalrecord->descrizione,
                   'danno' => $medicalrecord->danno . $psOrsm,
               ];
               
               //get the last user that had add record.
               if(empty($medicalrecordsOrdered['top']['last_modifica']) || $medicalrecordsOrdered['top']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['top']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

               continue;
           }elseif($medicalrecord->hurtposition === 'bottom'){
                $medicalrecordsOrdered['bottom'][]=[
                    'descrizione' => $medicalrecord->descrizione,
                    'danno' => $medicalrecord->danno . 'pc',
                ];
                 //get the last user that had add record.
               if(empty($medicalrecordsOrdered['bottom']['last_modifica']) || $medicalrecordsOrdered['bottom']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['bottom']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

                continue;
           }

           $medicalrecordsOrdered['middle'][]=[
            'descrizione' => $medicalrecord->descrizione,
            'danno' => $medicalrecord->danno . 'pc',
        ];
         //get the last user that had add record.
         if(empty($medicalrecordsOrdered['middle']['last_modifica']) || $medicalrecordsOrdered['middle']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['middle']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

        }
        return $medicalrecordsOrdered;
    }

    
    public function show($idUser){
        $user=\App\User::find($idUser);
        
        return view('internoLand.schedaUser.showMedicalRecord',[
            'user' => $user,
            'medicalrecords' => self::getMedicalRecords(($user)),
        ]);
    }

    public function store($user,Request $request)
    {
        $request->validate([
            'descrizione' => 'required|max:255|string',
            'danno' => 'required|numeric|max:0',
            'hurtposition' => [ 'required' , Rule::in(['top','bottom','middle','sanitamentale'])]
        ]);
        
        $newMedical = Medicalrecord::create([
            'descrizione' => strip_tags($request->descrizione),
            'danno' => $request->danno,
            'hurtposition' => strip_tags($request->hurtposition),
            'id_user_to' => $user,
            'id_user_from' => $request->user()->id
        ]);

        return $newMedical->load('userWhoAddHurt');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($medicalrecord)
    {    
        $medicalrecord = Medicalrecord::find($medicalrecord);
        $medicalrecord->delete();
        return $medicalrecord;
    }
}
