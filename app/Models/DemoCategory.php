<?php

namespace App\Models;

use AreiaLab\LaravelSeoSolution\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DemoCategory extends Model
{
    use HasSeoMeta;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image',
        'serial_no',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function demos(): HasMany
    {
        return $this->hasMany(Demo::class);
    }

    public function activeDemos(): HasMany
    {
        return $this->hasMany(Demo::class)
            ->where('status', true)
            ->orderBy('serial_no');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
