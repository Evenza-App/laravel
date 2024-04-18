<?php

namespace App\Models;

use App\Traits\Models\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventDetail extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['name', 'type', 'options', 'is_required', 'event_id'];


    protected $casts = [
        'options' => 'array',
        'is_required' => 'boolean',
    ];




    /**
     * Get the user that owns the EventDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get all of the comments for the EventDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservationdetails(): HasMany
    {
        return $this->hasMany(ReservationDetail::class);
    }
}
