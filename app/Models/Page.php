<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'business_id',
        'title',
        'slug',
        'template',
        'status',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class)
            ->orderBy('sort_order');
    }
}
