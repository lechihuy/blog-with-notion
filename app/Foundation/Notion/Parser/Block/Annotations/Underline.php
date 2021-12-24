<?php

namespace App\Foundation\Notion\Parser\Block\Annotations;

class Underline
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
        return $next('__'.$text.'__');
    }
}