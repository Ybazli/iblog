<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $guarded = [];

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
            $model->slug = Str::slug($model->name);

            return true;
        });
    }
}
