<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buffet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'image', 'price', 'type', 'category_id'];


    /**
     * Get the user that owns the Buffet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
