<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'address', //'birthDate',
        'user_id',
    ];

    /**
     * Get the user that owns the Customer
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
