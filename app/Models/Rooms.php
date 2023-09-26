<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'areage',
        'price',
        'id_cate_room',
        'id_wards',
    ];
    public $timestamps = true;
}
