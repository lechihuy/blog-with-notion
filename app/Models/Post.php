<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Image\Jobs\CacheImageWithUrlJob;
use App\Domains\Category\Jobs\FindCategoryByIdJob;

class Post extends Model
{
    protected $guarded = [];  

    public function getSlugAttribute()
    {
        return Str::slug($this->title);
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
}
