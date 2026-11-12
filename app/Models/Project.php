<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use Publishable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class)->orderBy('sort_order');
    }

    // Full title, e.g. "ITC" + "Amphitheatre"
    public function getFullTitleAttribute(): string
    {
        return trim($this->title_part1 . ' ' . $this->title_part2);
    }

    public function scopeInCategory($query, ?string $slug)
    {
        return $slug
            ? $query->whereHas('category', fn ($q) => $q->where('slug', $slug))
            : $query;
    }
}
