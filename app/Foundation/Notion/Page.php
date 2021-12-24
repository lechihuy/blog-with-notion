<?php

namespace App\Foundation\Notion;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;

class Page
{
    /**
     * The Notion client instance.
     * 
     * @var NotionClient
     */
    protected $client;

    /**
     * The page ID of Notion page.
     * 
     * @var string
     */
    protected ?string $pageId;

    /**
     * Create a new Notion page instace.
     * 
     * @param  string|null  $pageId
     * @param  NotionClient  $client
     * @return void
     */
    public function __construct(NotionClient $client, ?string $pageId = null)
    {
        $this->client = $client;
        $this->pageId = $pageId;
    }

    /**
     * Get the specified page with given page ID.
     * 
     * @return array
     */
    public function retrieve(): array
    {
        $url = $this->client->endpoint("/pages/{$this->pageId}");

        if ($cache = Cache::get($url))
            return $cache;

        return $this->client->makeRequest()->get($url)->json();
    }
}