<?php

namespace App\Filament\Admin\Resources\MunicipalityResource\Pages;

use App\Filament\Admin\Resources\MunicipalityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMunicipality extends EditRecord
{
    protected static string $resource = MunicipalityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['boundary'] = json_encode($data['boundary']);

        return $data;
    }
}
