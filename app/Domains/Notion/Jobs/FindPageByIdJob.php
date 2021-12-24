<?php

namespace App\Domains\Notion\Jobs;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Foundation\Notion\NotionClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;

class FindPageByIdJob
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
     * @return Model
     */
    public function handle(NotionClient $client)
    {
        $response = $client->page($this->id)->retrieve();

        if ($response['object'] === 'error' || $response['archived']) abort(404);

        $databaseId = Str::remove('-', Arr::get($response, 'parent.database_id'));
        $database = collect(config('notion.databases'))->firstWhere('id', $databaseId);
        if (is_null($database)) abort(404);

        $modelClass = $database['model']; 
        $model = new $modelClass($response);

        return $model;
    }
}