<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attraction extends Model
{
    use Publishable;

    protected $guarded = [];

    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }
}
