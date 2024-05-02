<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    /**
     * Get the user that owns the Admin
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
