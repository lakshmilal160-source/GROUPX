<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use Publishable;

    protected $guarded = [];

    public function page(): BelongsTo { return $this->belongsTo(Page::class); }

    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }
}
