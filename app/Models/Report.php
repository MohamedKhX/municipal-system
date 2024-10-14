<?php

namespace App\Models;

use App\Enums\ReportStatus;
use App\Enums\ReportType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Report extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
      'status' => ReportStatus::class,
      'type' => ReportType::class,
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->performOnCollections('thumbnails')
            ->fit(Fit::Contain, 368, 232)
            ->nonQueued();
    }
}
