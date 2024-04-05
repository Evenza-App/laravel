<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photographer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'bio', 'numOfhours', 'images'];


    protected $casts = [
        'images' => 'array',
    ];


    /**
     * Get all of the comments for the Photographer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
