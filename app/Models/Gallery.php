<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $guarded = [];

    protected $casts = ['is_banner' => 'boolean', 'is_card' => 'boolean'];

    // Each row belongs to a project, a destination OR a property (enforced by a DB check constraint)
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
