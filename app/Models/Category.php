<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Post\Jobs\SearchForPostJob;
use App\Domains\Pagination\Jobs\MakeSimplePaginatorJob;

class Category extends Model
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

        return Arr::get($this->attributes, "cover.${type}.url");
    }

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_time'];
    }

    public function posts()
    {
        $response = SearchForPostJob::dispatchSync([
            "filter" => [
                "and" => [
                    ["property" => 'published', "checkbox" => ['equals' => true]],
                    ["property" => 'category', "relation" => ['contains' => $this->id]],
                ],
            ],
        ]);

        $posts = MakeSimplePaginatorJob::dispatchSync($response['results'], 20);

        return $posts;
    }
}
