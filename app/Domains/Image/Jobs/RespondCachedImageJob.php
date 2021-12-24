<?php

namespace App\Domains\Image\Jobs;

use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Bus\Dispatchable;

class RespondCachedImageJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $image) {
        //
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->image)
            abort(404);

        return Image::make($this->image)->response();
    }
}