<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    protected $table = 'consultation_requests';

    protected $fillable = [
        'first_name',
        'last_name',
        'business_email',
        'company_name',
        'phone',
        'what_best_describe_you',
        'industry',
        'description',
        'type',
        'page_name',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];
}
