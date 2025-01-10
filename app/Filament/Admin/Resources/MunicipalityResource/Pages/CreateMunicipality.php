<?php

namespace App\Filament\Admin\Resources\MunicipalityResource\Pages;

use App\Filament\Admin\Resources\MunicipalityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMunicipality extends CreateRecord
{
    protected static string $resource = MunicipalityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['boundary'] = json_encode($data['boundary']);
        return $data;
    }
}
