<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Escalation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function original_employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'original_employee_id');
    }
    public function destination_employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'destination_employee_id');
    }
    public function escalation_state(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'escalation_state_id');
    }
    public function original_assignment(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'original_assignment_id');
    }
    public function destination_assignment(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'destination_assignment_id');
    }
}
