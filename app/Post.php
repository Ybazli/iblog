<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];
    protected $with = ['owner' , 'tags' , 'category'];
//    protected $casts = ['meta' => 'array'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class , 'tag_post_pivot' , 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function link()
    {
        return 'blog/'.$this->slug;
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model) {
            $model->slug = Str::slug($model->title);

            return true;
        });
    }
}
