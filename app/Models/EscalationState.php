<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EscalationState extends Model
{
    use HasFactory;
    protected $table = 'escalation_states';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    protected $casts = [
        'id' => 'string',
    ];
    public function escalations(): HasMany
    {
        return $this->hasMany(Escalation::class);
    }
}
