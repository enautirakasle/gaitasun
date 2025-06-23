<?php

namespace App\Filament\AppP\Resources;

use App\Filament\AppP\Resources\AlumnoResource\Pages;
use App\Filament\AppP\Resources\AlumnoResource\RelationManagers;
use App\Models\Alumno;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordUrl(null) // ← Agregar esta línea para deshabilitar el click en la fila
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('komunikazio')
                    ->label('Komunikazio')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(fn($record) => AlumnoResource::getUrl('komunikazio', ['record' => $record->id]))
                    ->openUrlInNewTab(false), // o true si quieres nueva ventana
                Action::make('pentsatzeko')
                    ->label('Pentsatzeko')
                    ->icon('heroicon-o-light-bulb')
                    ->url(fn($record) => AlumnoResource::getUrl('pentsatzeko', ['record' => $record->id])),
            ])->headerActions([
                Tables\Actions\CreateAction::make(),
            ])->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                //
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListAlumnos::route('/grupo/{record?}'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
            'view' => Pages\ViewAlumno::route('/{record}'),
            'komunikazio' => Pages\Komunikazio::route('/{record}/komunikazio'),
            'pentsatzeko' => Pages\Pentsatzeko::route('/{record}/pentsatzeko'),
        ];
    }


    public static function canViewAny(): bool
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return $user && $user->hasRole(['admin', 'profesor']);
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return $user && $user->hasRole(['admin']) && $record->profesor_id === $user->id;
    } 
}
