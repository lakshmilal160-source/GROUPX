<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsPost extends Model
{
    use Publishable;

    protected $guarded = [];

    protected $casts = [
        'publication_date' => 'date',
        'is_featured'      => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('publication_date')->orderByDesc('id');
    }
}
