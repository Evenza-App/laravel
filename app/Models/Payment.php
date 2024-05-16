<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['total_price', 'message', 'reservation_id'];

    protected $hidden = [
        'reservation_id',
        'created_at',
        'updated_at',
        'id',
    ];

    /**
     * Get the user that owns the Payment
     */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
