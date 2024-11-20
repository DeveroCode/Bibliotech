<div class="w-full h-auto">
    <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-1/4 px-3 py-4  font-medium text-gray-900">Bibliotecario</th>
                <th class="w-1/5 px-3 py-4  font-medium text-gray-900">Actividad</th>
                <th class="w-1/4 px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Descripción</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Fecha</th>
                <th class="px-3 py-4  font-medium text-gray-900">Hora</th>
            </tr>
        </thead>


        @foreach ($activities as $activity)
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                {{-- Titulo y Autores --}}
                <th class="flex gap-3 px-3 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700 capitalize">
                            {{ $activity->user->name . ' ' . $activity->user->apellido_paterno . ' ' .
                            $activity->user->apellido_materno }}
                        </div>
                    </div>
                </th>


                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">{{ $activity->activity }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">{{ $activity->description }}
                </td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{\Carbon\Carbon::parse($activity->created_at)->format('d-M-Y') }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{ \Carbon\Carbon::parse($activity->created_at)->format('h:i A') }}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <div class="mt-10">
        {{ $activities->links() }}
    </div>
</div>