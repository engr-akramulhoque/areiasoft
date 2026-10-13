<?php

namespace App\Models;

use AreiaLab\LaravelSeoSolution\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demo extends Model
{
    use HasSeoMeta;

    protected $fillable = [
        'demo_category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail',
        'preview_image',
        'demo_url',
        'technology',
        'serial_no',
        'featured',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DemoCategory::class, 'demo_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
