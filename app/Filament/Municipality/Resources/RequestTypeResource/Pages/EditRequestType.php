<?php

namespace App\Filament\Municipality\Resources\RequestTypeResource\Pages;

use App\Filament\Municipality\Resources\RequestTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRequestType extends EditRecord
{
    protected static string $resource = RequestTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
