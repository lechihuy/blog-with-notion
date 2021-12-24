<?php

namespace App\Foundation\Notion\Parser\Block\Annotations;

class Italic
{
    /**
     * Parse the text annotations to markdown.
     * 
     * @param  string  $text
     * @param  callable  $next
     * @return mixed
     */
    public function handle(string $text, $next): mixed
    {
        return $next('*'.$text.'*');
    }
}