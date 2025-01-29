<?php

namespace App\Jobs;

use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    public $application;

    public function __construct(Application $application)
    {
        $this->application=$application;
    }

    /**
     * Execute the job.
     */
    public function handle(Application $application, User $user): void
    {

        $manager=User::first();
        Mail::to($manager)->send(new ApplicationCreated($application));
    }
}
