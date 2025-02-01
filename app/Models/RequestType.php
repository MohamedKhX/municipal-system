<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RequestType extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'type' => \App\Enums\RequestType::class,
        'requirements' => 'json'
    ];
}
