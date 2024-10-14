<?php

namespace App\Models;

use App\Enums\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRating extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'rating' => Rating::class,
    ];
}
