<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceIndustry extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'icon',
        'image',
        'display_order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
