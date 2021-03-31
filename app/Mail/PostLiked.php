<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;
    public $liker;
    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Post $item)
    {
        $this->liker = $liker;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_liked')
        ->subject("Quelqu'nun a aimé votre publication");
    }
}
