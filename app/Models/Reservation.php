<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = ['date', 'time', 'location', 'numberOfPeople', 'image', 'status', 'event_id', 'photographer_id', 'user_id'];



    /**
     * The roles that belong to the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buffets(): BelongsToMany
    {
        return $this->belongsToMany(Buffet::class);
    }

    /**
     * Get the user that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photographer(): BelongsTo
    {
        return $this->belongsTo(Photographer::class);
    }

    /**
     * Get the user that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    /**
     * Get the user that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
