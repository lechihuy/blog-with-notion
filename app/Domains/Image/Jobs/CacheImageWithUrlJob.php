<?php

namespace App\Domains\Image\Jobs;

use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Bus\Dispatchable;

class CacheImageWithUrlJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $url) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $imageName = head(explode('?', basename($this->url)));

        if (!Cache::tags(['images'])->has($imageName)) {
            $image = Image::make($this->url);

            Cache::tags(['images'])->forever(
                $imageName, 
                (string) $image->encode('data-url')
            );
        }

        return route('web.images.show', ['image' => $imageName]);
    }
}