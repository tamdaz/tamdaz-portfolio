<?php

namespace App\Jobs;

use App\Mail\Contact\ContactMail;
use App\Mail\Contact\SuccessfullySentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param  array{name: string, email: string, message: string}  $form
     */
    public function __construct(
        public array $form
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(getenv('MAIL_FROM_ADDRESS'))->send(new ContactMail($this->form));
        Mail::to($this->form['email'])->send(new SuccessfullySentMail($this->form));
    }
}
