<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetItNow extends Model
{
    protected $table = 'get_it_now';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company_name',
        'what_best_describe_you',
        'services_interested_in',
        'page_name',
        'type',
        'other_data',
    ];

    protected $casts = [
        'services_interested_in' => 'array',
        'other_data' => 'array',
    ];
}
