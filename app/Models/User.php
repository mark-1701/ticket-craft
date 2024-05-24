<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class); 
    }
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }
    
    // public function employees_original_escalations(): HasMany
    // {
    //     return $this->hasMany(Escalation::class, 'id', 'original_employee_id');
    // }
    // public function employees_destination_escalations(): HasMany
    // {
    //     return $this->hasMany(Escalation::class, 'id', 'destination_employee_id');
    // }
}
