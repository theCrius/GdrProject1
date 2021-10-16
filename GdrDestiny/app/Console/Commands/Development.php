<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Development extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Development:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run enviroment to develop';

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
        $this->call("websocket:serve");
        $this->call("queue:work");

    }
}
