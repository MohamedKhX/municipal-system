<?php

namespace App\Filament\Municipality\Resources;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Filament\Municipality\Resources\UserResource\Pages;
use App\Filament\Municipality\Resources\UserResource\RelationManagers;
use App\Models\ReportType;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    protected static ?string $navigationGroup = 'إدارة الوصول';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make(__('User Info'))
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
                            ->required(),

                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->translateLabel()
                            ->required()
                            ->password()
                            ->maxLength(255)
                            ->disabledOn('edit')
                            ->hiddenOn('edit'),

                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->label(__('Roles'))
                            ->options(Role::all()->mapWithKeys(function ($item) {
                                return [$item['id'] => __($item['name'])];
                            })->toArray())
                            ->multiple(),

                        Forms\Components\Hidden::make('type')
                            ->default(UserType::Employee->value),

                        Forms\Components\Hidden::make('municipality_id')
                            ->default(Filament::auth()->user()->municipality_id),
                    ])
                    ->columns(1),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('edit password')
                    ->label(__("Edit Password"))
                    ->icon('heroicon-s-key')
                    ->color('primary')
                    ->url(function ($record) {
                        return 'users/' . $record->id . '/edit-password';
                    }),

            ])
            ->bulkActions([]);
    }

    public static function getEloquentQuery(): Builder
    {
        return User::where('municipality_id', Filament::auth()->user()->municipality_id)
            ->latest();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'edit-password' => Pages\EditUserPassword::route('/{record}/edit-password'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public static function getLabel(): ?string
    {
        return __('User');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Users');
    }
}
