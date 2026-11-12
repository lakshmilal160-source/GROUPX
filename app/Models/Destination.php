<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Destination extends Model
{
    use Publishable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function attractions(): HasMany
    {
        return $this->hasMany(Attraction::class)->orderBy('sort_order');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class)->orderBy('sort_order');
    }

    public function banners(): HasMany
    {
        return $this->gallery()->where('is_banner', true);
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(DestinationReview::class)->orderBy('sort_order');
    }

    // Photo shown on the destination slide card (tourism page)
    public function cardImage(): HasOne
    {
        return $this->hasOne(Gallery::class)->where('is_card', true);
    }
}
