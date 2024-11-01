<?php

namespace App\Filament\Municipality\Resources;

use App\Filament\Municipality\Resources\RequestTypeResource\Pages;
use App\Filament\Municipality\Resources\RequestTypeResource\RelationManagers;
use App\Models\Report;
use App\Models\RequestType;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestTypeResource extends Resource
{
    protected static ?string $model = RequestType::class;

    protected static ?string $navigationIcon = 'tabler-git-pull-request-draft';

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

                        Forms\Components\Select::make('type')
                            ->label('Type')
                            ->translateLabel()
                            ->options(\App\Enums\RequestType::getTranslations())
                            ->required(),

                        Repeater::make('requirements')
                            ->label(__('Requirements'))
                            ->schema([
                                TextInput::make('item')
                                    ->label('')
                                    ->required()
                                    ->minLength(3)
                                    ->maxLength(255),
                            ])
                            ->grid(3)
                            ->defaultItems(2)
                        ,

                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->conversion('thumbnail')
                            ->label('Thumbnail')
                            ->translateLabel(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->translateLabel()
                    ->badge()
                    ->color(fn($state) => $state->getColor())
                    ->icon(fn($state) => $state->getIcon())
                    ->formatStateUsing(fn($state) => $state->translate()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequestTypes::route('/'),
            'create' => Pages\CreateRequestType::route('/create'),
            'edit' => Pages\EditRequestType::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('Request Type');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Request Types');
    }

    public static function getNavigationLabel(): string
    {
        return __('Request Types');
    }
}
