<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    use Publishable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class);
    }
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    public function newsPosts(): HasMany
    {
        return $this->hasMany(NewsPost::class);
    }
    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }
}
