<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddPaletteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;

    public $palette_title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $palette_title)
    {
        $this->username = $username;
        $this->palette_title = $palette_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.addPalette')
                    ->subject('You Just Shared Your Palette Idea to FD Color Palette Community!');
    }
}
