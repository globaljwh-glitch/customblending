<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'title1',
        'title2',
        'title3',
        'description',
        'image',
        'highlight_block',
        'extra_data',
        'status',
    ];

    protected $casts = [
        'extra_data' => 'array',
        'status' => 'boolean',
    ];
}

