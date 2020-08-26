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
   
    }
}
