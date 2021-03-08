<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompleteReserve extends Mailable
{
    use Queueable, SerializesModels;
    
    private $reservation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.completeReserve')
                    ->subject('【手と手整骨院】ご予約が確定しました')
                    ->with(['reservation' => $this->reservation]);
    }
}
