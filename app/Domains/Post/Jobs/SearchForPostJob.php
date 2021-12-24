<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use App\Foundation\Notion\NotionClient;
use Illuminate\Foundation\Bus\Dispatchable;

class SearchForPostJob
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
        $response = $client->database(config('notion.databases.posts.id'))
            ->query($this->query);

        $response['results'] = collect($response['results'])->mapInto(Post::class)->all();

        return $response;
    }
}