<?php

namespace App\Filament\Municipality\Resources;

use App\Enums\ReportStatus;
use App\Enums\RequestStatus;
use App\Filament\Municipality\Resources\RequestResource\Pages;
use App\Filament\Municipality\Resources\RequestResource\RelationManagers;
use App\Models\Report;
use App\Models\Request;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestResource extends Resource
{
    protected static ?string $model = Request::class;

    protected static ?string $navigationIcon = 'tabler-git-pull-request';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Message')
                    ->description(fn (Request $record): string => str($record->message)->limit(50))
                    ->translateLabel(),


                Tables\Columns\TextColumn::make('type.type')
                    ->label('Type')
                    ->translateLabel()
                    ->description(fn (Request $record): string => str($record->type->name))
                    ->badge()
                    ->color(fn($state) => $state->getColor())
                    ->icon(fn($state) => $state->getIcon())
                    ->formatStateUsing(fn($state) => $state->translate()),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->badge()
                    ->color(fn($state) => $state->getColor())
                    ->icon(fn($state) => $state->getIcon())
                    ->formatStateUsing(fn($state) => $state->translate()),
            ])
            ->actions([
                Tables\Actions\Action::make('changeStatus')
                    ->label('Change Status')
                    ->translateLabel()
                    ->record(fn(Request $record) => $record)
                    ->color(Color::Indigo)
                    ->icon('tabler-api-app')
                    ->form([
                        Select::make('status')
                            ->options(RequestStatus::getTranslations())
                            ->translateLabel()
                            ->required()
                            ->native(false),
                    ])
                    ->action(function (array $data, Report $record): void {
                        $selectedOption = $data['status'];
                        $record->status = $selectedOption;
                        $record->save();
                    }),
                Tables\Actions\ViewAction::make()
                    ->color(Color::Cyan),
                Tables\Actions\DeleteAction::make(),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequests::route('/'),
        ];
    }
    public static function getLabel(): ?string
    {
        return __('Request');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Requests');
    }

    public static function getNavigationLabel(): string
    {
        return __('Requests');
    }
}
