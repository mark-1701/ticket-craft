<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Escalation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    // public function original_user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'original_user_id');
    // }
    // public function destination_user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'destination_user_id');
    // }
    // public function escalation_state(): BelongsTo
    // {
    //     return $this->belongsTo(EscalationState::class, 'escalation_state_id');
    // }
    // public function original_assignment(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'original_assignment_id');
    // }
    // public function destination_assignment(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'destination_assignment_id');
    // }
}
