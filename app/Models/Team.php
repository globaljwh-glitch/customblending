<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'designation',
        'bio',
        'image',
        'linkedin_url',
        'display_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
