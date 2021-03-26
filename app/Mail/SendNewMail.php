<?php

namespace App\Mail;

use App\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('deliveboo@mail.it')->view('mail.markdown')->with([
            'name' => $this->order->name,
            'surname' => $this->order->surname,
            'address' => $this->order->address,
            'email' => $this->order->email,
            'amount' => $this->order->amount,
        ]);
    }
}
