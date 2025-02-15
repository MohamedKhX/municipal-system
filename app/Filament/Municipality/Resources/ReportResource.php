<?php

namespace App\Filament\Municipality\Resources;

use App\Enums\ReportStatus;
use App\Filament\Municipality\Resources\ReportResource\Pages;
use App\Filament\Municipality\Resources\ReportResource\RelationManagers;
use App\Models\News;
use App\Models\Report;
use App\Models\ReportType;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'tabler-message-report';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->description(fn (Report $record): string => str($record->description)->limit(50))
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('street')
                    ->label('Street')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('reportType.name')
                    ->label('Type')
                    ->translateLabel()
                    ->badge(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->badge()
                    ->color(fn($state) => $state->getColor())
                    ->icon(fn($state) => $state->getIcon())
                    ->formatStateUsing(fn($state) => $state->translate()),
                ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->options(ReportStatus::getTranslations())
                    ->multiple(),

                SelectFilter::make('report_type_id')
                    ->label('Type')
                    ->translateLabel()
                    ->options(ReportType::pluck('name', 'id')->toArray())
                    ->multiple()
            ])
            ->actions([
                Tables\Actions\Action::make('changeStatus')
                    ->label('Change Status')
                    ->translateLabel()
                    ->record(fn(Report $record) => $record)
                    ->color(Color::Indigo)
                    ->icon('tabler-api-app')
                    ->form([
                        Select::make('status')
                            ->options(ReportStatus::getTranslations())
                            ->translateLabel()
                            ->required()
                            ->native(false),
                        ])
                    ->action(function (array $data, Report $record): void {
                        $selectedOption = $data['status'];
                        $record->status = $selectedOption;
                        $record->save();
                    }),

                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('view_report')
                    ->label('View')
                    ->translateLabel()
                    ->color('success')
                    ->icon('tabler-eye')
                    ->url(fn(Report $record) => route('reports.show', [auth()->user()->municipality->id, $record]), shouldOpenInNewTab: true),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return Report::where('municipality_id', Filament::auth()->user()->municipality_id)
            ->latest();
    }

    public static function getLabel(): ?string
    {
        return __('Report');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Reports');
    }

    public static function getNavigationLabel(): string
    {
        return __('Reports');
    }

}
