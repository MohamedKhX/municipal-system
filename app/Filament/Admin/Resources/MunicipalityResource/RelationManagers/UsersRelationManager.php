<?php

namespace App\Filament\Admin\Resources\MunicipalityResource\RelationManagers;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('First Name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('middle_name')
                    ->label('Middle Name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('last_name')
                    ->label('Last Name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->translateLabel()
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),


                Forms\Components\TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->translateLabel()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->numeric(),

                Forms\Components\TextInput::make('national_number')
                    ->label('National Number')
                    ->translateLabel()
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->options(Gender::getTranslations())
                    ->required()
                    ->columnSpan(2),

                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->translateLabel()
                    ->required()
                    ->password()
                    ->maxLength(255)
                    ->disabledOn('edit')
                    ->hiddenOn('edit')
                    ->columnSpan(2),

                Forms\Components\Hidden::make('type')
                    ->default(UserType::Employee->value),

                Forms\Components\Hidden::make('municipality_id')
                    ->default($this->getOwnerRecord()->id),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->after(function (User $user) {
                    $user->assignRole('admin');
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Users');
    }

    public static function getRecordLabel(): string
    {
        return __('User');
    }

    public static function getModelLabel(): ?string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('Users');
    }
}
