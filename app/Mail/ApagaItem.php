<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Item;

class ApagaItem extends Mailable
{
    use Queueable, SerializesModels;

    protected $titulo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.apaga_item')->with(['titulo'=>$titulo]);
    }
}
