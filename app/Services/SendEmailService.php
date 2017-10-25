<?php

namespace App\Services;


use App\Jobs\MailJob;
use App\Mail\MailFrame;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    use DispatchesJobs;

    public static function sendMailDispatch($to, $from, $subject, $view)
    {
        $self = new self();
        $self->dispatch(new MailJob($to, $from, $subject, $view));
    }

    public static function sendMail($to, $from, $subject, $view)
    {
        Mail::to($to)->send(new MailFrame($from, $subject, $view));
    }
}