<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostObserver
{
    /**

     * Handle the Post "created" event.

     * @param  \App\Models\Post  $post
     * @return void

     */
    public function created(Post $post)
    {
        //
        $id = Auth::id();
        $post->user_id=$id;
        $post->save();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
