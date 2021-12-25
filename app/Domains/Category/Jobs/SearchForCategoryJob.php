<?php

namespace App\Domains\Category\Jobs;

use App\Models\Category;
use App\Foundation\Notion\NotionClient;
use Illuminate\Foundation\Bus\Dispatchable;

class SearchForCategoryJob
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
        $response = $client->database(config('notion.databases.categories.id'))
            ->query($this->query);

        $response['results'] = collect($response['results'])->mapInto(Category::class)->all();

        return $response;
    }
}