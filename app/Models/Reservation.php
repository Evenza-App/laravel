<?php

namespace App\Models;

use App\Traits\Models\HasImage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['image', 'date', 'start_time', 'end_time', 'location', 'number_of_people', 'status', 'event_id', 'photographer_id', 'user_id', 'is_paid'];


    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public function status(): Attribute
    {
        return new Attribute(
            get: function ($value)  {
                try {
                    return Carbon::parse($this->date . ' ' . $this->end_time)->isPast() ? 'Passed' : $value;
                } catch (\Throwable $th) {
                    return $value;
                }
            },
        );
    }

    /**
     * The roles that belong to the Reservation
     */
    public function buffets(): BelongsToMany
    {
        return $this->belongsToMany(Buffet::class);
    }

    /**
     * Get the user that owns the Reservation
     */
    public function photographer(): BelongsTo
    {
        return $this->belongsTo(Photographer::class);
    }

    /**
     * Get the user that owns the Reservation
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the Reservation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the Reservation
     */
    public function details(): HasMany
    {
        return $this->hasMany(ReservationDetail::class);
    }

    /**
     * Get the user associated with the Reservation
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
