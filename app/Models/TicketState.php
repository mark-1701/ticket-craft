<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    use HasFactory;

    protected $table = 'ticket_states';
    protected $guarded = [];
    protected $casts = [
        'id' => 'string',
    ];
}
