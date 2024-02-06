<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'ceo_name',
        'teacher_name',
        'ceo_signature',
        'teacher_signature',
    ];
}
