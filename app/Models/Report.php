<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'when',
        'where',
        'who',
        'what',
        'why',
        'how',
        'reporter',
        'status',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Images::class);
    }
}
