<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use Publishable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }

    public function amenities(): HasMany
    {
        return $this->hasMany(PropertyAmenity::class)->orderBy('sort_order');
    }

    // Photo strip under the amenities bar
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class)->orderBy('sort_order');
    }

    // Hero facts fall back to the destination's values when left empty
    public function getShownLocationAttribute(): ?string
    {
        return $this->location    ?? $this->destination?->place;
    }
    public function getShownTemperatureAttribute(): ?string
    {
        return $this->temperature ?? $this->destination?->temperature;
    }
    public function getShownAltitudeAttribute(): ?string
    {
        return $this->altitude    ?? $this->destination?->terrain;
    }

    // Split description into paragraphs on blank lines
    public function getParagraphsAttribute(): array
    {
        return array_values(array_filter(preg_split('/\R{2,}/', (string) $this->description)));
    }
}
