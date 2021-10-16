<?php

namespace App\Jobs;

use App\Medicalrecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CureFinished implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $cure;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($cure)
    {
        $this->cure = $cure;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->cure->medicalrecordsToDelete as $medicalrecord)
        {   
            Medicalrecord::find($medicalrecord->id)->delete();
        }
    }
}
