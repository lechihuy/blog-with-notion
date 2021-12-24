<?php

namespace App\Foundation\Notion\Parser\Block;

use Illuminate\Support\Arr;

class Code
{
    /**
     * Parse the block to markdown.
     * 
     * @param  array  $block
     * @return string
     */
    public static function parse(array $block): string
    {
        $markdown = '```'.Arr::get($block, 'code.language').PHP_EOL;

        foreach (Arr::get($block, 'code.text') as $block) {
            $markdown .= Text::parse($block);
        }

        $markdown .= PHP_EOL.'```';

        return $markdown.PHP_EOL;
    }
}