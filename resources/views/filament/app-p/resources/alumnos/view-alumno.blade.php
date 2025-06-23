<x-filament::page>
    <h2 class="text-xl font-bold">Alumno: {{ $record->user->name }}</h2>

    <div class="mt-4">
        <p><strong>Correo:</strong> {{ $record->user->email }}</p>
        {{-- Aquí puedes poner lo que quieras --}}
    </div>

    <div class="mt-6">
        {{-- Ejemplo: tabla de evidencias --}}
            <livewire:tabla-evidencias-count :alumno-id="$record->id" />
    </div>
</x-filament::page>
