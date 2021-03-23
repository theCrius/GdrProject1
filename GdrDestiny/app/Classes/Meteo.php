<?php
    namespace App\Classes;
    trait Meteo{
        
        // to show meteo of a map
        public function show_meteo_info($nameClass,$id){
            dd($nameClass::find($id)->meteo);
            return response()->json( $nameClass::find($id) );

        } 

    }

?>
