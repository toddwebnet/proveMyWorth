<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class MailFrame extends Mailable
{
    // can't call them "from, subject and view" they are used in Mailable
    public $mailableFromAddress;
    public $mailableSubject;
    public $mailableView;

    public function __construct($from, $subject, $view)
    {
        $this->mailableFromAddress = $from;
        $this->mailableSubject = $subject;
        $this->mailableView = $view;
    }

    public function build()
    {

        return $this->from($this->mailableFromAddress)
            ->subject($this->mailableSubject)
            ->view($this->mailableView);
    }
}