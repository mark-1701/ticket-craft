<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    public function assignments_original_escalations(): HasMany
    {
        return $this->hasMany(Escalation::class, 'id', 'original_assignment_id');
    }
    public function assignments_destination_escalations(): HasMany
    {
        return $this->hasMany(Escalation::class, 'id', 'destination_assignment_id');
    }
}
