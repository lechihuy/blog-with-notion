<?php

namespace App\Foundation\Notion;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;

class Block
{
    /**
     * The Notion client instance.
     * 
     * @var NotionClient
     */
    protected $client;

    /**
     * The block ID of Notion block.
     * 
     * @var string
     */
    protected ?string $blockId;

    /**
     * Create a new Notion block instace.
     * 
     * @param  string|null  $blockId
     * @param  NotionClient  $client
     * @return void
     */
    public function __construct(NotionClient $client, ?string $blockId = null)
    {
        $this->client = $client;
        $this->blockId = $blockId;
    }

    /**
     * Get the specified block with given block ID.
     * 
     * @return Illuminate\Http\Client\Response
     */
    public function retrieve(): Response
    {
        $url = $this->client->endpoint("/blocks/{$this->blockId}");

        if ($cache = Cache::get($url))
            return $cache;

        return $this->client->makeRequest()->get($url)->json();
    }

    /**
     * Get all chilren of block with given block ID.
     * 
     * @return array
     */
    public function children(): array
    {
        $url = $this->client->endpoint("/blocks/{$this->blockId}/children");

        if ($cache = Cache::get($url))
            return $cache;

        return $this->client->makeRequest()->get($url)->json();
    }
}