<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticalLabService extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'position',
        'email',
        'phone',
        'interested_in',
        'message',
        'type',
        'page_name',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];
}
