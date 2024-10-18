<?php

namespace App\Filament\Municipality\Resources\ReportTypeResource\Pages;

use App\Filament\Municipality\Resources\ReportTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportTypes extends ListRecords
{
    protected static string $resource = ReportTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
