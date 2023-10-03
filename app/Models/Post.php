<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'image',
        'description',
        'metaDescription',
        'slug',
        'status',
        'id_admin',
    ];
    public $timestamps = true;

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggables');
    }
}
