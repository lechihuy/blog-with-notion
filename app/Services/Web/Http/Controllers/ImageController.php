<?php

namespace App\Services\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Web\Features\ShowHomePage;
use App\Services\Web\Features\ShowCachedImage;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return ShowCachedImage::dispatchSync();
    }
}
