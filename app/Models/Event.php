<?php

namespace App\Models;

use App\Traits\Models\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['name', 'image'];

    /**
     * Get all of the comments for the Event
     */
    public function details(): HasMany
    {
        return $this->hasMany(EventDetail::class);
    }

    /**
     * Get all of the comments for the Event
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
