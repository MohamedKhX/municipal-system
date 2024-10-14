<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RequestType extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'type' => \App\Enums\RequestType::class,
    ];
}
