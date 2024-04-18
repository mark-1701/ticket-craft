<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }
    public function employees_original_escalations(): HasMany
    {
        return $this->hasMany(Escalation::class, 'id', 'original_employee_id');
    }
    public function employees_destination_escalations(): HasMany
    {
        return $this->hasMany(Escalation::class, 'id', 'destination_employee_id');
    }
}
