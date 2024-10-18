<?php

namespace App\Filament\Municipality\Resources;

use App\Filament\Municipality\Resources\ReportTypeResource\Pages;
use App\Filament\Municipality\Resources\ReportTypeResource\RelationManagers;
use App\Models\ReportType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportTypeResource extends Resource
{
    protected static ?string $model = ReportType::class;

    protected static ?string $navigationIcon = 'tabler-info-hexagon';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->translateLabel()
                    ->required()
                    ->minLength(3)
                    ->maxLength(100),
            ]);
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
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportTypes::route('/'),
            'create' => Pages\CreateReportType::route('/create'),
            'edit' => Pages\EditReportType::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('Report Type');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Report Types');
    }

    public static function getNavigationLabel(): string
    {
        return __('Report Types');
    }
}
