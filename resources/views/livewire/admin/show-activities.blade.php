<div class="w-full h-auto overflow-x-auto">
    @if($activities->count() > 0)
    <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-1/4 px-3 py-4 font-medium text-gray-900">Bibliotecario</th>
                <th class="w-1/5 px-3 py-4 font-medium text-gray-900">Actividad</th>
                <th class="w-1/4 px-3 py-4 font-medium text-gray-900 hidden md:table-cell">Descripción</th>
                <th class="px-3 py-4 font-medium text-gray-900 hidden md:table-cell">Fecha</th>
                <th class="px-3 py-4 font-medium text-gray-900 hidden md:table-cell">Hora</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($activities as $activity)
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-3 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700 capitalize">
                            {{ $activity->user->name . ' ' . $activity->user->apellido_paterno . ' ' .
                            $activity->user->apellido_materno }}
                        </div>
                    </div>
                </th>

                <td class="px-2 py-2 capitalize text-black text-sm">{{ $activity->activity }}</td>

                <td class="px-2 py-2 capitalize text-black text-sm hidden md:table-cell">
                    {{ $activity->description }}
                </td>

                <td class="px-2 py-2 capitalize text-black text-sm hidden md:table-cell">
                    {{ \Carbon\Carbon::parse($activity->created_at)->format('d-M-Y') }}
                </td>

                <td class="px-2 py-2 capitalize text-black text-sm hidden md:table-cell">
                    {{ \Carbon\Carbon::parse($activity->created_at)->format('h:i A') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        {{ $activities->links() }}
    </div>
    @else
    <p class="text-center font-bold text-2xl text-gray-400">No hay actividades</p>
    @endif
</div>
