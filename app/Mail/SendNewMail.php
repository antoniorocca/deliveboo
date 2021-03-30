<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $datiUtente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datiUtente)
    {
        $this->datiUtente = $datiUtente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('deliveboo@mail.it')->view('mail.markdown')->with([
            'name' => $this->datiUtente['name'],
            'surname' => $this->datiUtente['surname'],
            'address' => $this->datiUtente['address'],
            'email' => $this->datiUtente['email'],
            'amount' => $this->datiUtente['amount'],
        ]);
    }
}
