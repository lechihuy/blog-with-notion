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
        $res = $client->database(config('notion.databases.posts'))
            ->query($this->query);

        $res['results'] = collect($res['results'])->mapInto(Post::class)->all();

        return $res;
    }
}