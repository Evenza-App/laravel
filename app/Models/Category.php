<?php

namespace App\Models;

use App\Traits\Models\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['name', 'image'];

    /**
     * Get all of the comments for the Category
     */
    public function buffets(): HasMany
    {
        return $this->hasMany(Buffet::class);
    }
}
