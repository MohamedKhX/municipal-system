<?php

namespace App\Filament\Municipality\Resources\UserResource\Pages;

use App\Filament\Municipality\Resources\UserResource;
use Filament\Actions;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditUserPassword extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make(__('Edit Password'))
                    ->schema([
                        TextInput::make('password')
                            ->label(__('Password'))
                            ->required()
                            ->password()
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ]);
    }

}
