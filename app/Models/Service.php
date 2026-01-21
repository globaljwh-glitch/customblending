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
        'status',
        'industry_section_title',
        'industry_section_description',
    ];

    // protected $casts = [
    //     'extra_data' => 'array',
    //     'status' => 'boolean',
    // ];

    /* =========================
       Relationships (children)
       ========================= */

    public function features()
    {
        return $this->hasMany(ServiceFeature::class)
                    ->orderBy('display_order');
    }

    public function accordions()
    {
        return $this->hasMany(ServiceAccordion::class)
                    ->orderBy('display_order');
    }

    public function industries()
    {
        return $this->hasMany(ServiceIndustry::class)
                    ->orderBy('display_order');
    }

    public function mediaSections()
    {
        return $this->hasMany(ServiceMediaSection::class)
                    ->orderBy('display_order');
    }
}


