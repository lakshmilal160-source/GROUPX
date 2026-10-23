<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionItem extends Model
{
    protected $fillable = [
        'page_section_id',
        'title',
        'description',
        'image',
        'link',
        'sort_order',
        'settings',
    ];

    protected function casts(): array
    {
        return [
            'settings' => 'array',
        ];
    }

    public function pageSection(): BelongsTo
    {
        return $this->belongsTo(PageSection::class);
    }
}
