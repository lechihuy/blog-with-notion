<?php

return [

    'auth' => env('NOTION_ACCESS_TOKEN'),

    'prefix' => 'https://api.notion.com/v1',

    'version' => '2021-08-16',
    
    'databases' => [
        'posts' => [
            'id' => '953179ff5c9d4b1cbf2c93a6ff9dc9ec',
            'model' => App\Models\Post::class,
        ],
        
        'categories' => [
            'id' => 'e59c4f37306c4920807b9f2a2c48cd8e',
            'model' => App\Models\Category::class,
        ],
    ]
];