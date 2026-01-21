<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceMediaSection extends Model
{
    protected $table = 'service_media_section';

    protected $fillable = [
        'service_id',
        'title',
        'description',
        'media_type',
        'media_path',
        'thumbnail',
        'display_order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
