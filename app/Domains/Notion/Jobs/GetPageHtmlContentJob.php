<?php

namespace App\Domains\Notion\Jobs;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Foundation\Notion\NotionClient;
use Illuminate\Database\Eloquent\Model;
use App\Foundation\Notion\Parser\Parser;
use Illuminate\Foundation\Bus\Dispatchable;

class GetPageHtmlContentJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $id) {
        //
    }

    /**
     * Execute the job.
     *
     * @return string
     */
    public function handle(NotionClient $client)
    {
        $response = $client->block(Str::remove('-', $this->id))->children();
        dump($response);
        return Parser::toHtml($response['results']);
    }
}