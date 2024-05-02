<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasImage
{
    public function image(): Attribute
    {
        return new Attribute(
            get: fn ($value) => request()->expectsJson() ? asset('storage/'.$value) : $value,
        );
    }
}
