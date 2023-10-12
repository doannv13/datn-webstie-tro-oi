<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EmailNotification;
use Mail;
class MailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $verification;
    /**
     * Create a new job instance.
     */
    public function __construct($data,$verification)
    {
        //
        $this->data = $data;
        $this->verification = $verification;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $email = new EmailNotification($this->verification);
        Mail::to($this->data['email'])->send($email);
    }
}
