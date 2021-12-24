<?php

namespace App\Domains\Notion\Jobs;

use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\Dispatchable;

class ExtractUUIDFromSlugJob
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
     * @return string|null
     */
    public function handle()
    {
        return Str::of($this->slug)->match('/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/');
    }
}