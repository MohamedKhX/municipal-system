<?php

namespace App\Filament\Municipality\Resources;

use App\Filament\Municipality\Resources\ServiceResource\Pages;
use App\Filament\Municipality\Resources\ServiceResource\RelationManagers;
use App\Models\ReportType;
use App\Models\Service;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'tabler-brand-unsplash';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->translateLabel()
                            ->required()
                            ->minLength(3)
                            ->maxLength(100),

                        RichEditor::make('description')
                            ->label('Description')
                            ->translateLabel()
                            ->required()
                            ->minLength(5),

                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->conversion('thumbnail')
                            ->label('Thumbnail')
                            ->translateLabel(),

                        Forms\Components\Hidden::make('municipality_id')
                            ->default(Filament::auth()->user()->municipality_id),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->description(fn (Service $record): string => str($record->description)->limit(80))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                //Todo: Add an action to redirect it to the service page
            ]);

    }

    public static function getEloquentQuery(): Builder
    {
        return Service::where('municipality_id', Filament::auth()->user()->municipality_id)
            ->latest();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('Service');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Services');
    }

    public static function getNavigationLabel(): string
    {
        return __('Services');
    }
}
