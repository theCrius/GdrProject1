<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newUser extends Mailable
{
    use Queueable, SerializesModels;


    private $password;
    public $name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$password)
    {
        if (!$name || !$password) throw new \Exception('Name o Password non presenti, impossibile mandare l\'email');
        $this->name=$name;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('EmailTemplate.newUser')
                    ->with([
                        'NameUser' => $this->name,
                        'PasswordGenerata' => $this->password
                    ])->subject('Benvenuto Nel GDR');
    }
}
