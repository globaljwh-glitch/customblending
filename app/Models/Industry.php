<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name',
        'title1',
        'title2',
        'title3',
        'image',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
