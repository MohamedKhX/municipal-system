<?php

namespace App\Filament\Municipality\Resources\RequestTypeResource\Pages;

use App\Filament\Municipality\Resources\RequestTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRequestTypes extends ListRecords
{
    protected static string $resource = RequestTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
