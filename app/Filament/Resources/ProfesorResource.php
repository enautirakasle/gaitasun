<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfesorResource\Pages;
use App\Filament\Resources\ProfesorResource\RelationManagers;
use App\Models\Profesor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput\Password;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
class ProfesorResource extends Resource
{
    protected static ?string $model = Profesor::class;
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Personal';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $pluralModelLabel = 'Listado de profesores';
    
    protected static ?string $navigationLabel = 'Profesores';


    public static function form(Form $form): Form
    {
      return $form
        ->schema([
            Hidden::make('user_id'),

            Section::make('Datos del Usuario')
                ->schema([
                    Group::make([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->maxLength(255)
                            ->same('password_confirmation')
                            ->dehydrated(fn ($state) => filled($state)) // solo guarda si se llenó
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state)),

                        TextInput::make('password_confirmation')
                            ->label('Confirmar Contraseña')
                            ->password()
                            ->maxLength(255)
                            ->dehydrated(false),
                    ])->relationship('user'),
                ]),
            Select::make('grupos')
                    ->label('Grupos asignados')
                    ->multiple()
                    ->relationship('grupos', 'nombre') // usa la relación belongsToMany
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        return "{$record->nombre} - {$record->curso->nombre}"; // o año si es mejor
                    })
                    ->preload()
                    ->searchable()
        ]);
                
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.roles.name')
                    ->label('Roles')
                    ->badge()
                    ->separator(', ')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProfesors::route('/'),
            'create' => Pages\CreateProfesor::route('/create'),
            'edit' => Pages\EditProfesor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
