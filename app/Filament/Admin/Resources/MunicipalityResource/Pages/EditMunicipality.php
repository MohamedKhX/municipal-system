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

 /*   protected function mutateFormDataBeforeSave(array $data): array
    {
        $boundaryCoordinates = collect($data['boundary'])->map(function ($point) {
            return [(float)$point['latitude'], (float)$point['longitude']];
        })->toArray();

        $formattedBoundary = ['boundary' => json_encode($boundaryCoordinates)];

        $data['boundary'] = $formattedBoundary['boundary'];

        return $data;
    }*/
}
