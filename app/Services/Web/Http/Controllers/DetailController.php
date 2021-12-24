<?php

namespace App\Services\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Web\Features\ShowDetailPage;

class DetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        return ShowDetailPage::dispatchSync($slug);
    }
}
