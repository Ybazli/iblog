<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Static_;

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

            $model->slug = static::createSlug($model->title);
            return true;
        });
    }


    protected static function createSlug($title, $id = 0)
    {

        $slug = str_slug($title);

        $allSlugs = static::getRelatedSlugs($slug, $id);

        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected static function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
