<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'metaTitle',
        'image',
        'description',
        'metaDescription',
        'slug',
        'status',
        'view',
        'id_admin',
        'ten_tac_gia',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
