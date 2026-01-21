<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'sub_title',
        'description',
        'image',
        'display_order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

