<?php

namespace App\Jobs;

use App\Mail\ApplicationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SenEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }


    public function handle(): void
    {
        Mail::to('manager@gmail.com')->send(new ApplicationCreated($application));
    }
}
