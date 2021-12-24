<?php

namespace App\Foundation\Notion\Listeners;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Events\ResponseReceived;

class CacheResponseReceived
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
     * @param  \Illuminate\Http\Client\Events\ResponseReceived  $event
     * @return void
     */
    public function handle(ResponseReceived $event)
    {
        Cache::forever($event->request->url(), $event->response->json());
    }
}