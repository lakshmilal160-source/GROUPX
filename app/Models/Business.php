<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'tagline',
        'description',
        'domain',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
