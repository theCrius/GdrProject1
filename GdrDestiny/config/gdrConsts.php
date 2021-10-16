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
        //quante immagini vanno nell'aria descrizioni di goni chat, modificare anche il component vuejs
        'max_images' => 3,
         //il menu tools in chat, tra parentesi tutti coloro che possono accedervi ( fare riferimento a ./roles.php )
        'tools' => [
            'note_chat' => [1,5],
            'news_chat' => [1,5],
            'cartella_clinica' => [2,5],
            'quest' => [3,5],
            'assegna_oggetti' => [2,5],
            'cura_pg' => '*'
        ],
    ],
    'medicalStuffs' => [
        'skills' => [
            'Medicina' =>[ 
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => 10,
                    'aggiunta_secca' => null,
                    'moltiplicatore_semplice' => null
                ]
            ],
            'Patologo' =>  [
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => 5,
                    'aggiunta_secca' => null,
                    'moltiplicatore_semplice' => null
                ]
            ],
            'Cruel Angel\'s Thesis' => [
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => null,
                    'aggiunta_secca' => 20,
                    'moltiplicatore_semplice' => null
                ]
            ],
            'Metabolismo Adattivo' => [   
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => null,
                    'aggiunta_secca' => 10,
                    'moltiplicatore_semplice' => null
                ]
            ],
            'Immunità alle Infezioni' =>[
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => null,
                    'aggiunta_secca' => 30,
                    'moltiplicatore_semplice' => null
                ]
            ],
            'Convalescenze' => [
                
                'caratteristica' => null,
                'moltiplicatore' => [
                    'per_livello' => null,
                    'aggiunta_secca' => 30,
                    'moltiplicatore_semplice' => null
                ]
            ],
        ],
        'specs' => [
            
            'Cerchio AOE' => [
                'caratteristica' => 'intelligenza',
                'moltiplicatore' => [
                    'per_livello' => null,
                    'aggiunta_secca' => null,
                    'moltiplicatore_semplice' => 2
                ]
            ]

        ]
    ],

    'quest' => [
        //dopo quanto aperta una quest la salva
        'interval_between_open_close' => 60
    ]
   
    
   


];



?>