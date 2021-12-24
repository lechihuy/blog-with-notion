<?php

namespace App\Services\Web\Features;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Domains\Image\Jobs\GetCachedImageJob;
use App\Domains\Image\Jobs\RespondCachedImageJob;

class ShowCachedImage
{
    use Dispatchable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $imageName = $request->image;

        $image = GetCachedImageJob::dispatchSync($imageName);

        return RespondCachedImageJob::dispatchSync($image);
    }
}