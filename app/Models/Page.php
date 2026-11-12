<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use Publishable;

    protected $guarded = [];

    // business_id = null means a main Group XI page
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class)->orderBy('sort_order');
    }
}
