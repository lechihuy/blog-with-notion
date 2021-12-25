<?php

namespace App\Foundation\Notion\Parser\Block;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Quote
{
    /**
     * Parse the block to markdown.
     * 
     * @param  array  $block
     * @return string
     */
    public static function parse(array $block): string
    {
        $markdown = '';

        foreach (Arr::get($block, 'quote.text') as $block) {
            $markdown .= Text::parse($block);
        }

        $markdown = Str::of($markdown)->replaceMatches('/\n\n/', PHP_EOL.'> '.PHP_EOL.'> ');

        return '> '.$markdown.PHP_EOL.PHP_EOL;
    }
}