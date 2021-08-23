<?php 

namespace App\Classes;

use Error;

trait ActionHandler
{

    public function cleanTextToSend($textToClean, $symbolToDelete,$symbol_name)
    {  
        $new_action =  $symbol_name == 'sussurri' ? \Str::substr($textToClean, strpos($textToClean,$symbolToDelete,1)+1) : \Str::replaceFirst($symbolToDelete,'',$textToClean);
        if( $symbol_name == 'dadi') $new_action =  $this->dadi($textToClean);
        return htmlspecialchars($new_action);
    }

    public function dadi($textToClean)
    {
        $sommaPunteggio = 0;
        $attributo = '';
        $skillOrSpec = '';
        $dado = 0;

        if( !$textToClean['attributo']['level'] && !$textToClean['skillOrSpec'] && !$textToClean['dado'] ) throw new Error('Nessun dato inserito');
        if( $textToClean['attributo'] ){ $attributo = $textToClean['attributo']['name'] . " " . $textToClean['attributo']['level'];  $sommaPunteggio += $textToClean['attributo']['level'];}
        if( $textToClean['skillOrSpec'])
        { 
            $livello = $textToClean['skillOrSpec']->pivot->livello ?? $textToClean['skillOrSpec']->livello;
            $skillOrSpec = $textToClean['skillOrSpec']->name ." " . $livello;
            $sommaPunteggio += $livello;
        } 
        if( $textToClean['dado'] ){ $dado = rand(0, $textToClean['dado']); $sommaPunteggio += $dado;}
        return "Risultato lancio skill/dado: " . $attributo . " + " . $skillOrSpec . ' + ' . 'Dado ' . $dado . " = " . $sommaPunteggio;
    } 


}


?>