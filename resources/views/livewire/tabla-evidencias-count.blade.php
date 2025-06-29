<div class="p-4 bg-white shadow rounded">
    <h3 class="text-lg font-bold mb-2">Total de evidencias {{ $evidencias->count() }}</h3>
    <div class="mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Indicador</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Competencia</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($evidencias as $evidencia)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-4 py-2">
                            <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
                                {{ \Carbon\Carbon::parse($evidencia->fecha)->format('d/m/Y') }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
                                {{ $evidencia->indicador->nombre }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
                                {{ $evidencia->indicador->competenciaTransversal->nombre }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
