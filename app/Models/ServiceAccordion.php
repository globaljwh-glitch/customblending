<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAccordion extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'display_order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
