<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'training_id'
    ];

    public function certificate(): HasOne
    {
        return $this->hasOne(Certificate::class, 'participant_id');
    }

    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function scopeWhereName(Builder $query, string|null $name, bool $like = false): Builder
    {
        if ($like) {
            return $query->where('name', 'LIKE', "%$name%");
        } else {
            return $query->where('name', $name);
        }
    }

    public function scopeWhereTraining(Builder $query, string|null $training): Builder
    {
        return $query->whereHas('training', function ($q) use ($training) {
            return $q->where('title', $training);
        });
    }
}
