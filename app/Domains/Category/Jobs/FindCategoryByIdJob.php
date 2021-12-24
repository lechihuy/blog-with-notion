<?php

namespace App\Domains\Category\Jobs;

use App\Foundation\Notion\NotionClient;
use Illuminate\Foundation\Bus\Dispatchable;

class FindCategoryByIdJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $id)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NotionClient $client)
    {
        $res = $client->page($this->id)->retrieve();

        return $res;
    }
}