<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Request extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'status' => RequestStatus::class,
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(RequestType::class, 'request_type_id');
    }



    public function fullName(): Attribute
    {
        return Attribute::get(fn() => $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('userAttachments');
        $this->addMediaCollection('municipalityAttachments');
    }

    public function userAttachments(): Attribute
    {
        return Attribute::get(function () {
            return $this->getMedia('userAttachments');
        });
    }

    public function municipalityAttachments(): Attribute
    {
        return Attribute::get(function () {
            return $this->getMedia('municipalityAttachments');
        });
    }
}
