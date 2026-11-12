<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationReview extends Model
{
    use Publishable;

    protected $guarded = [];

    protected $casts = ['reviewed_at' => 'date'];

    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }

    public function getStarsAttribute(): string
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }
}
