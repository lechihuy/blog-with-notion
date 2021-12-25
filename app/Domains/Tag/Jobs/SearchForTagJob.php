<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use App\Foundation\Notion\NotionClient;
use Illuminate\Foundation\Bus\Dispatchable;

class SearchForTagJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $query = [])
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NotionClient $client)
    {
        $response = $client->database(config('notion.databases.tags.id'))
            ->query($this->query);

        $response['results'] = collect($response['results'])->mapInto(Tag::class)->all();

        return $response;
    }
}