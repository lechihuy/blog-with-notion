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
        $requestData = $event->request->data() ?? [];
        $url = $event->request->url();
        $cacheKey = count($requestData) ? $url.'|'.json_encode($requestData) : $url; 

        Cache::forever($cacheKey, $event->response->json());
    }
}