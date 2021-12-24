<?php

namespace App\Foundation\Notion\Parser\Block;

use Illuminate\Support\Arr;

class Heading3
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

        foreach (Arr::get($block, 'heading_3.text') as $block) {
            $markdown .= Text::parse($block);
        }
        
        return '### '.$markdown.PHP_EOL.PHP_EOL;
    }
}