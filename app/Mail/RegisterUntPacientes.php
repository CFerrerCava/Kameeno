<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUntPacientes extends Mailable
{
    use Queueable, SerializesModels;
    public $names;
    public $dni;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($names, $dni, $url)
    {
        $this->names = $names;
        $this->dni = $dni;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.registerUntPaciente');
    }
}
