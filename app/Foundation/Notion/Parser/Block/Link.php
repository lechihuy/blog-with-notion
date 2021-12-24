<?php

namespace App\Foundation\Notion\Parser\Block;

class Link
{
    /**
     * Parse the block to markdown.
     * 
     * @param  array  $block
     * @param  string  $text
     * @return string
     */
    public static function parse(array $block): mixed
    {
        return "[{$block['plain_text']}]({$block['href']})";
    }
}