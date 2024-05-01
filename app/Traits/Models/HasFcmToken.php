<?php

// namespace App\Traits\Models;

// trait HasFcmToken
// {
//     //
// }

namespace App\Traits\Models;

use App\Models\FcmToken;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasFcmToken
{
    public function tokens(): HasMany
    {
        return $this->hasMany(FcmToken::class);
    }
}
