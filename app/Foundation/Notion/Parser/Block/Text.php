<?php

namespace App\Foundation\Notion\Parser\Block;

use Illuminate\Support\Arr;
use Illuminate\Pipeline\Pipeline;
use App\Foundation\Notion\Parser\Block\Annotations\Bold;
use App\Foundation\Notion\Parser\Block\Annotations\Code;
use App\Foundation\Notion\Parser\Block\Annotations\Italic;
use App\Foundation\Notion\Parser\Block\Annotations\Underline;

class Text
{
    /**
     * Parse the block to markdown.
     * 
     * @param  array  $block
     * @return string
     */
    public static function parse(array $block): string
    {
        $markdown = Arr::get($block, 'text.content');

        return (new Pipeline(app()))->send($markdown)->through(array_filter([
            Arr::get($block, 'annotations.bold') ? Bold::class : null,
            Arr::get($block, 'annotations.code') ? Code::class : null,
            Arr::get($block, 'annotations.italic') ? Italic::class : null,
            Arr::get($block, 'annotations.strikethrough') ? Strikethrough::class : null,
            Arr::get($block, 'annotations.underline') ? Underline::class : null,
        ]))->thenReturn();
    }
}