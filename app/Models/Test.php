<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'test_date',
        'location',
        'estimation',
        'standard',
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
