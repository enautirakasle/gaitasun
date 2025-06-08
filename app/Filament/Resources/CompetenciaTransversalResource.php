<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetenciaTransversalResource\Pages;
use App\Filament\Resources\CompetenciaTransversalResource\RelationManagers;
use App\Models\CompetenciaTransversal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetenciaTransversalResource extends Resource
{
    protected static ?string $model = CompetenciaTransversal::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb'; //light-bulb chat-bubble-left-ellipsis

    protected static ?string $navigationLabel = 'Competencias Transversales';
    
    protected static ?string $pluralModelLabel = 'Listado de Competencias Transversales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            RelationManagers\IndicadorsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetenciaTransversals::route('/'),
            'create' => Pages\CreateCompetenciaTransversal::route('/create'),
            'edit' => Pages\EditCompetenciaTransversal::route('/{record}/edit'),
        ];
    }
}
