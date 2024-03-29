<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departament extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'id' => 'string',
    ];

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}
