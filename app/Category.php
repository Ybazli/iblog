<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class , 'category_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $model->slug = Str::slug($model->name);

            return true;
        });
    }
}
