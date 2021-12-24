<?php

namespace App\Foundation\Notion\Parser;

use Illuminate\Support\Arr;
use League\CommonMark\MarkdownConverter;
use App\Foundation\Notion\Parser\Block\Code;
use App\Foundation\Notion\Parser\Block\Image;
use App\Foundation\Notion\Parser\Block\Paragraph;

class Parser
{
    /**
     * The markdown will be returned.
     * 
     * @return string
     */
    protected $markdown;

    /**
     * Create a new parser instance.
     * 
     * @param  array  $blocks
     * @return void
     */
    public function __construct($blocks)
    {
        $blocks = Arr::isAssoc($blocks) ? [$blocks] : $blocks;

        foreach ($blocks as $block) {
            $this->markdown .= match ($block['type']) {
                'paragraph' => Paragraph::parse($block),
                'code' => Code::parse($block),
                'image' => Image::parse($block),
                default => null,
            };
        }
    }

    /**
     * Parse the blocks to Markdown format.
     * 
     * @param  array  $blocks
     * @return void
     */
    public static function toMarkdown($blocks)
    {
        return (string) new static($blocks);
    }

    /**
     * Parse the blocks to HTML format.
     * 
     * @param  array  $blocks
     * @return void
     */
    public static function toHtml($blocks)
    {
        return app(MarkdownConverter::class)
            ->convertToHtml(static::toMarkdown($blocks))
            ->getContent();
    }

    /**
     * Convert the parse to string.
     * 
     * @param  array  $blocks
     * @return void
     */
    public function __toString()
    {
        return $this->markdown;
    }
}