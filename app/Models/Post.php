<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Foundation\Notion\Parser\Parser;
use App\Domains\Image\Jobs\CacheImageWithUrlJob;
use App\Domains\Category\Jobs\FindCategoryByIdJob;
use App\Operations\GetCachedPageHtmlContentOperation;
use App\Domains\Notion\Jobs\GetPageMarkdownContentJob;

class Post extends Model
{
    protected $guarded = [];  

    protected $keyType = 'string';

    public function getSlugAttribute()
    {
        return Str::slug($this->title).'-'.$this->attributes['id'];
    }

    public function getTitleAttribute()
    {
        return Arr::get($this->attributes, 'properties.title.title.0.plain_text');
    }

    public function getThumbnailAttribute()
    {
        $type = Arr::get($this->attributes, 'cover.type');
        $url = Arr::get($this->attributes, "cover.${type}.url");

        return is_null($url) ? null : CacheImageWithUrlJob::dispatchSync($url);
    }

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_time'];
    }

    public function category()
    {
        return new Category(FindCategoryByIdJob::dispatchSync(
            Arr::get($this->attributes, 'properties.category.relation.0.id')
        ));
    }

    public function getContentAttribute()
    {
        return GetCachedPageHtmlContentOperation::dispatchSync($this->id);
    }
}
