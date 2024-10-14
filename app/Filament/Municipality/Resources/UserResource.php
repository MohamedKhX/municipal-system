<?php

namespace App\Filament\Municipality\Resources;

use App\Filament\Municipality\Resources\UserResource\Pages;
use App\Filament\Municipality\Resources\UserResource\RelationManagers;
use App\Models\User;
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
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->minLength(3)
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label(__('Email'))
                            ->unique(ignoreRecord: true)
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('password')
                            ->label(__('Password'))
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

    public static function getRelations(): array
    {
        return [
            //
        ];
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
