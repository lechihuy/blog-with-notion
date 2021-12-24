<?php

namespace App\Domains\Image\Jobs;

use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Bus\Dispatchable;

class GetCachedImageJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $imageName) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        return Cache::tags(['images'])->get($this->imageName);
    }
}