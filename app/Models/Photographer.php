<?php

namespace App\Models;

use App\Traits\Models\HasImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photographer extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['name', 'image', 'bio', 'images'];

    public function images(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                $value = json_decode($value);
                if (request()->expectsJson()) {
                    foreach ($value as &$image) {
                        $image = asset('storage/'.$image);
                    }
                }

                return $value;
            },
            set: fn ($value) => json_encode($value),
        );
    }

    /**
     * Get all of the comments for the Photographer
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
