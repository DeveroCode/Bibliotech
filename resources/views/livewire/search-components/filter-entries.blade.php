<div class="py-10">
    <div class="max-w-7xl mx-auto px-4">
        <form wire:submit.prevent='searchLoan'>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Actividad -->
                <div>
                    <x-input-label for="actividad" :value="__('Actividad')" class="uppercase text-sm font-semibold mb-1 block" />
                    <select id="actividad" wire:model="actividad" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                        <option value="">--Seleccione--</option>
                        <option value="Estudio">Estudio</option>
                        <option value="Consulta">Consulta</option>
                        <option value="Tarea">Tarea</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <!-- Género -->
                <div>
                    <x-input-label for="genero" :value="__('Género')" class="uppercase text-sm font-semibold mb-1 block" />
                    <select id="genero" wire:model="genero" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                        <option value="">--Seleccione--</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>

                <!-- Trimestre -->
                <div>
                    <x-input-label for="trimestre" :value="__('Trimestre')" class="uppercase text-sm font-semibold mb-1 block" />
                    <select id="trimestre" wire:model="trimestre" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                        <option value="0">--Seleccione--</option>
                        <option value="1">Primer Trimestre</option>
                        <option value="2">Segundo Trimestre</option>
                        <option value="3">Tercer Trimestre</option>
                        <option value="4">Cuarto Trimestre</option>
                    </select>
                </div>

                <!-- Fecha inicio -->
                <div>
                    <x-input-label for="start" :value="__('Fecha Inicio')" class="uppercase text-sm font-semibold mb-1 block" />
                    <x-date-input wire:model="start" id="start" />
                </div>

                <!-- Fecha fin -->
                <div>
                    <x-input-label for="end" :value="__('Fecha Fin')" class="uppercase text-sm font-semibold mb-1 block" />
                    <x-date-input wire:model="end" id="end" />
                </div>
            </div>
        </form>
    </div>
</div>
