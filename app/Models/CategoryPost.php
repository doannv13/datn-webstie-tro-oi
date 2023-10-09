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
        return $this->hasMany(Post::class, 'category_post_id', 'id');
    }
}
