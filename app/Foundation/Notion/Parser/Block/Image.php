<?php

namespace App\Foundation\Notion\Parser\Block;

use Illuminate\Support\Arr;

class Image
{
    /**
     * Parse the block to markdown.
     * 
     * @param  array  $block
     * @return string
     */
    public static function parse(array $block): string
    {
        $captions = Arr::get($block, 'image.caption');
        $caption = count($captions) ? head($captions)['plain_text'] : null;
        $url = Arr::get($block, 'image.file.url');

        return "![{$caption}]($url)".PHP_EOL;
    }
}