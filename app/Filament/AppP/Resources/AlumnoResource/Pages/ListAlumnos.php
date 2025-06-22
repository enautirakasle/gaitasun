<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ListAlumnos extends ListRecords
{
    protected static string $resource = AlumnoResource::class;

    public int|null $groupId = null;

    public function mount(?string $record = null): void
    {
        parent::mount();

        if ($record) {
            // Puedes usar $record para filtrar la tabla, ejemplo:
            $this->groupId = $record;
            // dd($this->groupId);
        }
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                function (Builder $query) {
                    $groupId = $this->groupId; // o request()->get('group_id') si está en recurso

                    return $query->whereHas('grupos', function (Builder $q) use ($groupId) {
                        $q->where('grupos.id', $groupId);
                    });
                }

            )->columns(AlumnoResource::table(new Table($this))->getColumns());
    }





    // public function getTabs(): array
    // {
    //     return [
    //         'all' => Tab::make(),
    //         'andiak' => Tab::make()
    //             ->modifyQueryUsing(fn(Builder $query) => $query->where('id', '>', 5)),
    //         'txikiak' => Tab::make()
    //             ->modifyQueryUsing(fn(Builder $query) => $query->where('id', '<=', 5)),
    //     ];
    // }
}
