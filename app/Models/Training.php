<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'started_at',
    ];

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class, 'training_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'started_at' => 'date',
    ];

    public function scopeWhereTitle(Builder $query, string|null $title, bool $like = false): Builder
    {
        if ($like) {
            return $query->where('title', 'LIKE', "%$title%");
        } else {
            return $query->where('title', $title);
        }
    }
}
