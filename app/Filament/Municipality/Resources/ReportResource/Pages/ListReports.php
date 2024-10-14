<?php

namespace App\Filament\Municipality\Resources\ReportResource\Pages;

use App\Filament\Municipality\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
