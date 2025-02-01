<?php

namespace App\Models;

use App\Enums\ReportStatus;
use http\Exception\BadConversionException;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Report extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
      'status' => ReportStatus::class,
    ];

    public function reportType(): BelongsTo
    {
        return $this->belongsTo(ReportType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->performOnCollections('thumbnails')
            ->fit(Fit::Contain, 368, 232)
            ->nonQueued();
    }

    public function thumbnail(): Attribute
    {
        return Attribute::get(fn() => $this->getMedia('media')->first()?->getUrl());
    }

    public function images(): Attribute
    {
        return Attribute::get(fn() => $this->getMedia('media'));
    }
}
