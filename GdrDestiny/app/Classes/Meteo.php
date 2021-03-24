<?php
    namespace App\Classes;

    use Exception;

trait Meteo{
        
        // to show meteo of a map
        public function show_meteo_info($nameClass,$id){
            
            $nameClass = "App\\" . $nameClass;

            return response()->json( $nameClass::select('name','meteo','updated_at')->find($id) );

        }

        public function update_meteo($nameClass , $id , $datas)
        {   
            $nameClass = "App\\" . $nameClass;
                
                try{
                    
                    $map = $nameClass::findOrFail($id);
                    $map->meteo = $datas;
                    $map->save();
        
        
                }catch(Exception $e){
                    
                    return response()->json($e->getMessage());
                
                }
                
        
        }

    }

?>
