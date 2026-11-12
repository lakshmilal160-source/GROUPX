<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $guarded = [];

    protected $casts = [
        'check_in'  => 'date',
        'check_out' => 'date',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->salutation . ' ' . $this->first_name . ' ' . $this->last_name);
    }
}
