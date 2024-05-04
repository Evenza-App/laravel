<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCredintial extends Model
{
    protected $fillable = ['key', 'secret'];

    protected function casts()
    {
        return [
            'key' => 'hashed',
            'secret' => 'hashed',
        ];
    }
}
