<?php

namespace App\Models;

use AreiaLab\LaravelSeoSolution\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoLandingPage extends Model
{
    use HasFactory;
    use HasSeoMeta;

    protected $fillable = [
        'title',
        'slug',
        'eyebrow',

        'hero_title',
        'hero_description',
        'hero_image',

        'primary_cta',
        'primary_cta_url',

        'secondary_cta',
        'secondary_cta_url',

        'problem',
        'solution',
        'capabilities',
        'process',
        'technologies',
        'benefits',
        'faqs',
        'related_pages',

        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'problem' => 'array',
            'solution' => 'array',
            'capabilities' => 'array',
            'process' => 'array',
            'technologies' => 'array',
            'benefits' => 'array',
            'faqs' => 'array',
            'related_pages' => 'array',
            'status' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }
}
