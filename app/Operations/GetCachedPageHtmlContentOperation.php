<?php

namespace App\Operations;

use Illuminate\Support\Str;
use App\Foundation\Notion\Parser\Parser;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Domains\Image\Jobs\CacheImageWithUrlJob;
use App\Domains\Notion\Jobs\GetPageMarkdownContentJob;

class GetCachedPageHtmlContentOperation
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $id) {
        //
    }

    /**
     * Execute the job.
     *
     * @return string
     */
    public function handle()
    {
        $content = GetPageMarkdownContentJob::dispatchSync($this->id);
        
        $imageUrls = Str::of($content)->matchAll('/!\[[^\]]*\]\((.*?)\s*("(?:.*[^"])")?\s*\)/');
        
        collect($imageUrls)->each(function($imageUrl) use (&$content) {
            $cachedImageUrl = CacheImageWithUrlJob::dispatchSync($imageUrl);
            $content = Str::replace(trim($imageUrl), $cachedImageUrl, $content);
        });
        
        return Parser::markdownToHtml($content);
    }
}