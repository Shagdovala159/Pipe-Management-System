<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Images extends Model
{
    protected $fillable = [
        'id',
        'report_id',
        'path',
    ];
    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
