<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    use HasFactory;

    protected $table = 'priorities';
    protected $guarded = [];
    protected $casts = [
        'id' => 'string',
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'id', 'priority_id');
    }
}
