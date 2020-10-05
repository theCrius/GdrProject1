<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;

class PopolateDatabase extends Command
{

    public function insertBreeds(){
        $umani=\App\Breed::insert([[
                'name' => 'Umani',
                'forza' => 10,
                'destrezza' => 13,
                'resistenza' => 18,
                'prontezza' => 10,
                'percezione' => 16,
                'intelligenza' => 17,
                'punti_mente' => 100,
                'punti_corpo'=> 120,
                'descrizione'=>'okokkok',
                'immagini'=>'humanico.png',
                'forzaLimite' => 30,
                'destrezzaLimite' => 30,
                'resistenzaLimite' => 35,
                'prontezzaLimite' => 25,
                'percezioneLimite' => 20,
                'intelligenzaLimite' => 25,
        ],
       
    [
                'name' => 'Insonni',
                'forza' => 15,
                'destrezza' => 17,
                'resistenza' => 10,
                'prontezza' => 20,
                'percezione' => 18,
                'intelligenza' => 15,
                'punti_mente' => 140,
                'punti_corpo'=> 90,
                'descrizione'=>'okokkok',
                'immagini'=>'awoken.png',
                'forzaLimite' => 25,
                'destrezzaLimite' => 35,
                'resistenzaLimite' => 30,
                'prontezzaLimite' => 30,
                'percezioneLimite' => 35,
                'intelligenzaLimite' => 30,
        ],
       
    [       
                'name' => 'Exo',
                'forza' => 20,
                'destrezza' => 16,
                'resistenza' => 20,
                'prontezza' => 15,
                'percezione' => 14,
                'intelligenza' => 13,
                'punti_mente' => 80,
                'punti_corpo'=> 130,
                'descrizione'=>'okokkok',
                'immagini'=>'exo.png',
                'forzaLimite' => 25,
                'destrezzaLimite' => 25,
                'resistenzaLimite' => 35,
                'prontezzaLimite' => 25,
                'percezioneLimite' => 25,
                'intelligenzaLimite' => 25,

        ]
    
    
    
    
        ]);
    }
    public function insertHemisperes(){
        
            $hemisperes=\App\Hemispere::insert([
               
            [
                    'name' => 'emisfero destro',
                    'descrizione' =>'okfokdfkokdf',
                    'immagini' => 'emidx.png',           
                ],
               
            [
                    'name' => 'emisfero sinistro',
                    'descrizione' =>'okfokdfkokdf',
                    'immagini' => 'emisx.png',           
                ]
            ]);
    }

    public function insertClasses(){
        $classes=\App\Classe::insert([
           
        [
                'name' => 'Cittadino',
                'immagine' => 'cittadino.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Sinners',
                'immagine' => 'sinners.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Survivor',
                'immagine' => 'survivor.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Tech-Fighter',
                'immagine' => 'tfighter.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Hunter',
                'immagine' => 'hunter.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Titan',
                'immagine' => 'titan.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Warlock',
                'immagine' => 'warlock.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Pilota',
                'immagine' => 'airman.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Geniere',
                'immagine' => 'geniere.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Dottore',
                'immagine' => 'dottore.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Cyberwalker',
                'immagine' => 'cyberwalker.png',
                'descrizione' => 'okok'
            ],
            
           

        ]);
    }

     public function insertSkills(){
         $skills_classe=\App\Skill::insert([           
            [
                'name' => 'AS Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
            ],
            [
                'name' => 'EVA Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
            ],
            [
                'name' => 'SHAS Licence',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
            ],
            [
                'name' => 'Tempo Prezioso',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
            ],
            [
                'name' => 'Riflessi Pronti',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
            ],
            [
                'name' => 'Medicina',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
            ],
            [
                'name' => 'Biologia',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
            ],
            [
                'name' => 'EVA Healer',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
            ],
            [
                'name' => 'Patologo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
            ],
            [
                'name' => 'Medicina d’Assalto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
            ],
            [
                'name' => 'Mecha Physician',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
            ],
            [
                'name' => 'T-Operator',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
            ],
            [
                'name' => 'EVA Physician',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
            ],
            [
                'name' => 'Equipment Designer',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
            ],
            [
                'name' => 'Genio d’Assalto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
            ],
            [
                'name' => 'Furia dello Spirito',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
            ],
            [
                'name' => 'Gambler',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
            ],
            [
                'name' => 'Metabolismo Adattivo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
            ],
            [
                'name' => 'Natural Survival',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
            ],
            [
                'name' => 'Immunità alle Infenzione',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
            ],
            [
                'name' => 'Vivremo per Sempre',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
            ],
            [
                'name' => 'Voci del Vuoto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
            ],
            [
                'name' => 'Dono di Lasa',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
            ],
            [
                'name' => 'Maledizione del Rovo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
            ],
            [
                'name' => 'Agony Arc',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
            ],
            [
                'name' => 'Knights Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
            ],
            [
                'name' => 'DIY Master',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
            ],
            [
                'name' => 'Ad Ogni Costo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
            ],
            [
                'name' => 'Tracker',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
            ],
            [
                'name' => 'Rilocatore',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
            ],
            [
                'name' => 'C-Builter',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
            ],
            [
                'name' => 'ATST',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
            ],
            [
                'name' => 'Ghost Customer',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
            ],
            [
                'name' => 'Black-Technology',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
            ],
            [
                'name' => 'Vexaniacs',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
            ],
            [
                'name' => 'Conoscenza della Strada',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
            ],
            [
                'name' => 'Espressione Artistica',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
            ],
            [
                'name' => 'Rissa',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
            ],
            [
                'name' => 'Legge',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
            ],
            [
                'name' => 'Buon Senso',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
            ],


            ]);
            $skills_breed=\App\Skill::insert([            
            [
                'name' => 'Vocazione',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Resistenza',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Forza di Volontà',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Adattabilità',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Volto in Vista',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Estremi Rimedi',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Dominio Territoriale',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Depistaggio',
                'id_breed'=> 1,
                
                
            ],
            [
                'name' => 'Sensi Sviluppati',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Visione del Piano Ascendente',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Canto della Bestia',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Presa Mentale',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Sangue Blu',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Campione',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Equilibrio',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Liberazione',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Ascensione',
                'id_breed'=> 2,
                
                
            ],
            [
                'name' => 'Memoria Espansa',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Forza Brutale',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Sangue Freddo',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Connessione Remota',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Calcolo della Realtà',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Backup',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Maschera dei Mille Volti',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Resistenza agli EMP',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Sembianze Umane',
                'id_breed'=> 3,
                
                
            ],
            [
                'name' => 'Code-Exo',
                'id_breed'=> 3,
                  
            ],
                
                ]);
            $skills_hemispere=\App\Skill::insert([            
            [
                'name' => 'Veglia',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Compostezza',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Autorità',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Intuizione',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Ambidestro',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Autoapprendimento',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Orologio Biologico',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Codice d\'Onore',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Stella dei Vex',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Controllo della Ghiandola Pineale',
                'id_hemispere'=> 2,
                
                
            ],
            [
                'name' => 'Charme',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Empatia',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Espressività',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Galateo',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Equilibrio Felino',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Sotterfugio',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Memoria Fotografica',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Alleato del Mondo Animale',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Inoffensivo',
                'id_hemispere'=> 1,
                
                
            ],
            [
                'name' => 'Santità',
                'id_hemispere'=> 1,
            ]

         ]);
     }
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PopolateDatabase:add_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To popolate the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
          //inserire le razze
          $this->insertBreeds();

          //inserire gli emisferi
          $this->insertHemisperes();

          //inserire le classi
          $this->insertClasses();

          //inserire abilita
          $this->insertSkills();
   
    }
}
