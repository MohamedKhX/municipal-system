<?php

namespace App\Filament\Municipality\Resources;

use App\Filament\Municipality\Resources\NewsResource\Pages;
use App\Filament\Municipality\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'tabler-news';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->translateLabel()
                            ->required()
                            ->minLength(5)
                            ->maxLength(100),

                        Textarea::make('body')
                            ->label('Content')
                            ->translateLabel()
                            ->required()
                            ->minLength(5),

                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->conversion('thumbnail')
                            ->collection('thumbnails')
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
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->translateLabel()
                    ->conversion('thumbnail')
                    ->collection('thumbnails'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->description(fn (News $record): string => str($record->body)->limit(80))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return News::where('municipality_id', Filament::auth()->user()->municipality_id)
            ->latest();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('News');
    }

    public static function getPluralLabel(): ?string
    {
        return __('News');
    }

    public static function getNavigationLabel(): string
    {
        return __('News');
    }
}
