<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketState extends Model
{
    use HasFactory;

    protected $table = 'ticket_states';
    protected $guarded = [];
    protected $casts = [
        'id' => 'string',
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
