<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use Publishable;

    protected $guarded = [];

    // business_id = null means it belongs to the main Group XI site
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function scopeForBusiness($query, ?int $businessId)
    {
        return $businessId === null
            ? $query->whereNull('business_id')
            : $query->where('business_id', $businessId);
    }
}
