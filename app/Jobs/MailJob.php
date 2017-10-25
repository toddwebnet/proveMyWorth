<?php

namespace App\Jobs;

use App\Services\SendEmailService;
use App\Services\TestJobService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MailJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $to, $from, $subject, $view;

    public function __construct($to, $from, $subject, $view)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->view = $view;
    }

    public function handle()
    {
        SendEmailService::sendMail($this->to, $this->from, $this->subject, $this->view);
    }

}