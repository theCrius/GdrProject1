<?php 
return [
    'messages' =>[
        
        'max_length_message' => 2000,
        'max_length_title' => 1000,
        'error' => [
            'message' => 'Lunghezza del titolo massima raggiunta',
            'title' => 'Lunghezza del titolo massima raggiunta',
    ],
    ],

    'meteo' => [

        //ogni quante ore si aggiorna il meteo
        'each_hours' => 4,
        
    ],

    'chat' => [
        'action' => [
            //massima lunghezza delle azioni
            'max_length' => 2500, //caratteri,
            //dopo quante ore le azioni non vengono più viste in chat
            'max_hours' => 1,
            'money_got' => 300,
            'exp_got' => 5,
        ] ,
        'symbols' => [
            'comunicazioni_off' => '$',
            'sussurri' => '#',
            'fato' => '&',
            'action' => '',
            'dadi' => '',
        ],
         //il menu tools in chat, tra parentesi tutti coloro che possono accedervi ( fare riferimento a ./roles.php )
        'tools' => [
            'note_chat' => [1,5],
            'news_chat' => [1,5],
            'cartella_clinica' => [2,5],
            'apri_quest' => [3,5],
            'assegna_oggetti' => [2,5],
            'cura_pg' => '*'
        ]
    ],
   
    
   


];



?>