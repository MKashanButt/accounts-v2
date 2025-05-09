<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = [
        'date',
        'description',
        'file',
        'type',
        'amount',
        'head_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function head(): BelongsTo
    {
        return $this->belongsTo(Head::class);
    }
}
