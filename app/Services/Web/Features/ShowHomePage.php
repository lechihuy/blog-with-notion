<?php

namespace App\Services\Web\Features;

use App\Domains\Post\Jobs\SearchForPostJob;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pagination\Jobs\MakeSimplePaginatorJob;

class ShowHomePage
{
    use Dispatchable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = SearchForPostJob::dispatchSync([
            "filter" => [
                "property" => 'published',
                "checkbox" => [
                    'equals' => true
                ]
            ],
        ]);

        $posts = MakeSimplePaginatorJob::dispatchSync($response['results'], 20);

        return RespondWithViewJob::dispatchSync('web::home', compact('posts'));
    }
}