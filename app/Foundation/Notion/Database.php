<?php

namespace App\Foundation\Notion;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;

class Database
{
    /**
     * The Notion client instance.
     * 
     * @var NotionClient
     */
    protected $client;

    /**
     * The database ID of Notion database.
     * 
     * @var string
     */
    protected ?string $databaseId;

    /**
     * Create a new Notion database instace.
     * 
     * @param  string|null  $databaseId
     * @param  NotionClient  $client
     * @return void
     */
    public function __construct(NotionClient $client, ?string $databaseId = null)
    {
        $this->client = $client;
        $this->databaseId = $databaseId;
    }

    /**
     * Get the specified database with given database ID.
     * 
     * @return Illuminate\Http\Client\Response
     */
    public function retrieve(): Response
    {
        $url = $this->client->endpoint("/databases/{$this->databaseId}");
        
        if ($cache = Cache::get($url))
            return $cache;

        return $this->client->makeRequest()->get($url)->json();
    }

    /**
     * Query a database with given database ID. 
     * 
     * @param  array  $data
     * @return array
     */
    public function query(array $data = []): array
    {
        $request = $this->client->makeRequest();
        $url = $this->client->endpoint("/databases/{$this->databaseId}/query");
        $cacheKey = count($data) ? $url.'|'.json_encode($data) : $url;

        if ($cache = Cache::get($cacheKey))
            return $cache;

        if (count($data) == 0) 
            $request->withBody('', '');

        return $request->post($url, $data)->json();
    }
}