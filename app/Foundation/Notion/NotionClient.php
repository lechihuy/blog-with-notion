<?php

namespace App\Foundation\Notion;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class NotionClient
{
    /**
     * The prefix of Notion API.
     * 
     * @var string
     */
    protected string $prefix;

    /**
     * The access token that use to authenticate to the Notion integration.
     * 
     * @var string
     */
    protected string $auth;

    /**
     * Create a new Notion client instace.
     * 
     * @param  string|null  $auth
     * @return void
     */
    public function __construct(?string $auth = null)
    {
        $this->auth = $auth ?? config('notion.auth');
        $this->prefix = config('notion.prefix');
    }
    
    /**
     * Create a new Notion database instance.
     * 
     * @param  string|null  $databaseId
     * @return Database
     */
    public function database(?string $databaseId = null): Database
    {
        return new Database($this, $databaseId);
    }

    /**
     * Create a new Notion page instance.
     * 
     * @param  string|null  $pageId
     * @return Page
     */
    public function page(?string $pageId = null): Page
    {
        return new Page($this, $pageId);
    }

    /**
     * Create a new Notion block instance.
     * 
     * @param  string|null  $blockId
     * @return Block
     */
    public function block(?string $blockId = null): Block
    {
        return new Block($this, $blockId);
    }

    /**
     * Create the HTTP client request instance.
     * 
     * @return PendingRequest
     */
    public function makeRequest(): PendingRequest
    {
        return Http::withToken($this->auth)
            ->withHeaders(['Notion-Version' => config('notion.version')])
            ->contentType('application/json')
            ->acceptJson();
    }

    /**
     * Retrieve the endpoint with given path.
     * 
     * @param  string|null $path
     * @return string
     */
    public function endpoint(?string $path = null): string
    {
        return rtrim($this->prefix.'/'.trim($path, '/'), '/');
    }
}