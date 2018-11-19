<?php

namespace App\Listeners;

use App\Events\BroadcastChannel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadcastChannelListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BroadcastChannel  $event
     * @return void
     */
    public function handle(BroadcastChannel $event)
    {
        //
    }
}
