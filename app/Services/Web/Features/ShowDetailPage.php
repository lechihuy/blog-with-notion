<?php

namespace App\Services\Web\Features;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Domains\Notion\Jobs\FindPageByIdJob;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Notion\Jobs\ExtractUUIDFromSlugJob;

class ShowDetailPage
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $slug) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $pageId = ExtractUUIDFromSlugJob::dispatchSync($this->slug);

        $page = FindPageByIdJob::dispatchSync($pageId);

        dump($page);
    }
}