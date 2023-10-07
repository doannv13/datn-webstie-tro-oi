<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'slug',
        'description'
    ];
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_category_post', 'id');
    }
    public static function boot(){
        parent::boot();
        static::deleting(function ($category_posts) {
            $PostsToUpdate = Post::where('id_category_post', $category_posts->id)->get();
            foreach ($PostsToUpdate as $Post) {
                $Post->id_category_post = 1;
                $Post->save();
            }
        });
    }
}
