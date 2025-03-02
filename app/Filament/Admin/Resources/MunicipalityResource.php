<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Actions\TableActions\SecureDeleteAction;
use App\Filament\Admin\Resources\MunicipalityResource\Pages;
use App\Filament\Admin\Resources\MunicipalityResource\RelationManagers;
use App\Models\Municipality;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MunicipalityResource extends Resource
{
    protected static ?string $model = Municipality::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->translateLabel()
                            ->required()
                            ->minLength(5)
                            ->maxLength(100),

                        Forms\Components\Repeater::make('boundary')
                            ->schema([
                                TextInput::make('latitude')
                                    ->label('Latitude')
                                    ->translateLabel()
                                    ->required()
                                    ->numeric(),

                                TextInput::make('longitude')
                                    ->label('Longitude')
                                    ->translateLabel()
                                    ->required()
                                    ->numeric(),
                            ])
                            ->minItems(3)
                    ])->columns(1),
                ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                SecureDeleteAction::make(),
                Tables\Actions\Action::make('active')
                    ->label('Active')
                    ->translateLabel()
                    ->action(function ($record) {
                        $record->is_active = true;
                        $record->save();
                    })
                    ->color('success')
                    ->icon('heroicon-s-check-circle')
                    ->requiresConfirmation()
                    ->hidden(fn($record) => $record->is_active),

                Tables\Actions\Action::make('de_active')
                    ->label('De Active')
                    ->translateLabel()
                    ->action(function ($record) {
                        $record->is_active = false;
                        $record->save();
                    })
                    ->color('danger')
                    ->icon('heroicon-s-x-circle')
                    ->requiresConfirmation()
                    ->hidden(fn($record) => !$record->is_active)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMunicipalities::route('/'),
            'create' => Pages\CreateMunicipality::route('/create'),
            'edit' => Pages\EditMunicipality::route('/{record}/edit'),
        ];
    }


    public static function getLabel(): ?string
    {
        return __('Municipality');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Municipalities');
    }

    public static function getNavigationLabel(): string
    {
        return __('Municipalities');
    }
}
