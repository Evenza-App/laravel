<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationDetail extends Model
{
    use HasFactory;


    protected $fillable = ['value', 'event_detail_id', 'reservation_id'];


    /**
     * Get the user that owns the ReservationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventdetail(): BelongsTo
    {
        return $this->belongsTo(EventDetail::class);
    }


    /**
     * Get the user that owns the ReservationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
