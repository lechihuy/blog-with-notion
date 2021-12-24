<?php

use Illuminate\Support\Facades\Route;
use App\Foundation\Notion\NotionClient;
use App\Foundation\Notion\Parser\Parser;
use App\Domains\Post\Jobs\SearchForPostJob;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    // $client = new NotionClient();
    // $result = $client->database('953179ff5c9d4b1cbf2c93a6ff9dc9ec')->query([
    //     "filter" => [
    //         "property" => 'published',
    //         "checkbox" => [
    //             'equals' => true
    //         ]
    //     ],
    // ]);
    // dump($result->json());
    // $result = $client->block('0ccf98a13b78401fbdd1b62893b16598')->children();
    // dump(Parser::toHtml($result->json()['results']));
    dump(SearchForPostJob::dispatchSync()->json());
});
