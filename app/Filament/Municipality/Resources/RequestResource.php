<?php

namespace App\Filament\Municipality\Resources;

use App\Enums\ReportStatus;
use App\Enums\RequestStatus;
use App\Filament\Municipality\Resources\RequestResource\Pages;
use App\Filament\Municipality\Resources\RequestResource\RelationManagers;
use App\Livewire\CreateResponse;
use App\Models\Report;
use App\Models\Request;
use App\Models\Response;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

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
                    ->visible(fn(Request $record) => $record->status == RequestStatus::Pending)
                    ->record(fn(Request $record) => $record)
                    ->color(Color::Indigo)
                    ->icon('tabler-api-app')
                    ->modalContent(function (Request $record) {
                        return new HtmlString(Infolist::make()
                            ->record($record)
                            ->schema([
                                Fieldset::make('details')
                                    ->label('Details')
                                    ->translateLabel()
                                    ->schema([
                                        TextEntry::make('fullName')
                                            ->label('Name')
                                            ->translateLabel(),

                                        TextEntry::make('subject')
                                            ->label('Subject')
                                            ->translateLabel(),

                                        TextEntry::make('status')
                                            ->label('Status')
                                            ->translateLabel()
                                            ->badge()
                                            ->formatStateUsing(fn($state) => $state->translate())
                                            ->color(fn($state) => $state->getColor())
                                            ->icon(fn($state) => $state->getIcon()),

                                          TextEntry::make('type.type')
                                              ->label('Type')
                                              ->translateLabel()
                                              ->badge()
                                              ->formatStateUsing(fn($state) => $state->translate())
                                              ->color(fn($state) => $state->getColor())
                                              ->icon(fn($state) => $state->getIcon()),

                                        TextEntry::make('message')
                                            ->label('Message')
                                            ->translateLabel()
                                            ->columnSpan(4),

                                        RepeatableEntry::make('userAttachments')
                                            ->label('Attachments')
                                            ->translateLabel()
                                            ->schema([
                                                TextEntry::make('file_name')
                                                    ->label('File Name')
                                                    ->translateLabel()
                                                    ->limit(30),

                                                TextEntry::make('size')
                                                    ->label('Size')
                                                    ->translateLabel()
                                                    ->formatStateUsing(fn ($state) => round($state / 1048576, 2)),

                                                TextEntry::make('mime_type')
                                                    ->label('Type')
                                                    ->translateLabel(),

                                                TextEntry::make('')
                                                    ->label('Link')
                                                    ->translateLabel()
                                                    ->formatStateUsing(fn ($state) => __('Click To Download'))
                                                    ->url(fn($record) => $record->getUrl(), true),
                                            ])
                                            ->columns(2)
                                            ->columnSpan(4)
                                    ])
                                    ->columns(4)

                            ])
                            ->toHtml());
                    })
                    ->form([
                        Select::make('status')
                            ->options(RequestStatus::getTranslations())
                            ->translateLabel()
                            ->required()
                            ->native(false),

                        TextInput::make('response')
                            ->label('Reason')
                            ->translateLabel()
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('municipalityAttachments')
                            ->label('Attachments')
                            ->translateLabel()
                            ->collection('municipalityAttachments')

                    ])
                    ->action(function (array $data, Request $record): void {
                        $record->status = $data['status'];
                        $record->response = $data['response'];
                        $record->save();
                    }),

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
