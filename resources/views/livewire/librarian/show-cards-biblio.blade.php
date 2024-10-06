<div class="grid grid-cols-12 gap-4">
    {{-- Tiempo --}}
    <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
            <div
                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                <i class="fa-solid fa-clock"></i>
            </div>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex flex-col">
                    <span class="text-sm text-gray-500">Tiempo Actual</span>
                    <div x-data="{ time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) }"
                        x-init="setInterval(() => time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }), 1000)">
                        <span x-text="time" class="text-lg font-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Total libros --}}
    <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
            <div
                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                <i class="fas fa-book"></i>
            </div>
            <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">Libros</div>
                <div class="font-bold text-lg">{{ $libros_en_existencia }}</div>
            </div>
        </div>
    </div>

    {{-- Préstamos --}}
    <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
            <div
                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                <i class="fa-solid fa-user-minus"></i>
            </div>
            <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">Préstamos</div>
                <div class="font-bold text-lg">{{ $loans }}</div>
            </div>
        </div>
    </div>

    {{-- Visitantes - Pendiente --}}
    <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
            <div
                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">Visitantes</div>
                <div class="font-bold text-lg">1259</div>
            </div>
        </div>
    </div>
</div>