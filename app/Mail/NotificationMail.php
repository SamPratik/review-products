<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Post as Post;
use Auth;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $post;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postId)
    {
        $post = Post::find($postId);
        $this->post = $post;
        $this->name = Auth::user()->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)
                    ->view('email.notification');
    }
}
