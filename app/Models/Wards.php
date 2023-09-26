<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wards extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'id_district'
    ];

    public $timestamps = true;
}
