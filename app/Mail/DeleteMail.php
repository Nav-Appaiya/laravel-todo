<?php

namespace App\Mail;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteMail extends Mailable
{

    /**
     * The Todo instance.
     *
     * @var \App\Models\Todo
     */
    public $todo;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.removed')
            ->from('hello@todo-app.test');

    }
}
