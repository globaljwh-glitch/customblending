<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'first_name',
        'last_name',
        'business_email',
        'company_name',
        'phone',
        'what_best_describe_you',
        'industry',
        'message',
    ];
}
