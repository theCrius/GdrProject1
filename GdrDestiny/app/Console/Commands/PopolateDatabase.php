<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;
use App\Classes\InsertStuffs;

class PopolateDatabase extends Command
{
    use InsertStuffs;
    
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

          //inserire Admin
          $this->insertAdmin();

          //inserire abilita
          $this->insertSkills();

          //inserire le specializzazioni
          $this->insertSpecialitazions();

          //inserire le categorie del mercato
          $this->insertSellingObjectCategories();

          //mercato, oggetti da vendere e categorie
          $this->insertMercato();

          //mecha ed esoscheletro
          $this->insertDataMecha();
   
    }
}
