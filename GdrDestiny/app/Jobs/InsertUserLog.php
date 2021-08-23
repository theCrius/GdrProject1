<?php

namespace App\Jobs;

use App\Userloggedlog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertUserLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $idUser;
    protected $ip;
    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Int $idUser,$ip)
    {
        $this->idUser = $idUser;
        $this->ip = $ip;
    
        
    }

    public $uniqueFor = 3600;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        Userloggedlog::create([
            'id_user' => $this->idUser,
            'ip' => $this->ip
        ]);

    }
}
