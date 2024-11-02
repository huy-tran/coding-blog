<?php

namespace Modules\Base\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlugAttribute
{
    public function scopeBySlug(Builder $query, string $slug): Model
    {
        return $query->where('slug', $slug)->firstOrFail();
    }

    public function scopeByKeyNameOrSlug(Builder $query, $value)
    {
        return $query->bySlug($value)
            ->orWhere((new static)->getKeyName(), 'like binary', $value);
    }

    public function setSlug(string $slug, ?int $time = null): self
    {
        $slug = Str::slug($slug);

        if ($time) {
            $slug .= "-{$time}";
        }

        if ($this->newQuery()->bySlug($slug)->exists()) {
            return $this->setSlug($slug, time());
        }

        $this->slug = $slug;

        return $this;
    }
}
