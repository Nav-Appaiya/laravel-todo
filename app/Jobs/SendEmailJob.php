<?php
/**
 * 03-Nov 2021 by Nav
 * A Job that schedules the SendEmailJob for execution
 */
namespace App\Jobs;

use App\Mail\DeleteMail;
use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $todo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new DeleteMail($this->todo);
        Mail::to($this->todo->email)->send($email);
    }
}
