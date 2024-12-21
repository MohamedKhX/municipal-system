<?php

namespace App\Filament\Admin\Resources\MunicipalityResource\Pages;

use App\Filament\Admin\Resources\MunicipalityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMunicipality extends CreateRecord
{
    protected static string $resource = MunicipalityResource::class;

   /* protected function mutateFormDataBeforeCreate(array $data): array
    {
        $boundaryCoordinates = collect($data['boundary'])->map(function ($point) {
            return [(float)$point['latitude'], (float)$point['longitude']];
        })->toArray();

        $formattedBoundary = ['boundary' => json_encode($boundaryCoordinates)];

        $data['boundary'] = $formattedBoundary['boundary'];

        return $data;
    }*/
}
