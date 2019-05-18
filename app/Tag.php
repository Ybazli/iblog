<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $guarded = [];

    protected $table = 'tags';

    public function posts()
    {
        return $this->belongsToMany(Post::class , 'tag_post_pivot' , 'tag_id');
    }

    /**
     * Generate slug automatic when saving model
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {

            $model->slug = static::createSlug($model->name);
            return true;

        });
    }


    protected static function createSlug($name, $id = 0)
    {

        $slug = str_slug($name);

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
        return Tag::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
