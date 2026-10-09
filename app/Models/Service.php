<?php

namespace App\Models;

use AreiaLab\LaravelSeoSolution\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasSeoMeta;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'hero_description',
        'image',
        'alt_text',
        'overview',
        'seo_content',
        'metrics',
        'features',
        'technologies',
        'benefits',
        'cta_title',
        'cta_text',
        'cta_button',
        'icon',
        'sort_order',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'metrics' => 'array',
            'features' => 'array',
            'technologies' => 'array',
            'benefits' => 'array',
            'active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
