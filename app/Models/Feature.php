<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use Traits\Relations\BelongsTo\Category;

    protected string $name = 'feature';
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'is_required',
        'is_filter',
        'title',
        'type',
        'hint',
        'units',
        'values',
    ];
    protected $casts = [
        'values' => 'array',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Feature::class, 'parent_id', 'id')->orderBy('ord');
    }

    public function getKeyAttribute(): string
    {
        return "f$this->id";
    }
}