<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

        return Arr::get($this->attributes, "cover.${type}.url");
    }

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_time'];
    }
}
