<div>
    {{-- Form alumno --}}
    <div class="mt-2">
        @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div
                class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
                {{ session('message') }}
            </div>
        </div>
        @endif

        {{-- Alerta de alumno no encontrado --}}
        @if ($found)
        <div x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)" x-show="showAlert"
            class="bg-red-100 border border-red-600 text-red-600 font-bold p-2 my-3 text-center">
            <h2 class="text-xl">Alumno no encontrado o inscrito</h2>
        </div>
        @elseif ($loan)
        <div x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)" x-show="showAlert"
            class="bg-red-100 border border-red-600 text-red-600 font-bold p-2 my-3 text-center">
            <h2 class="text-xl">ISBN no encontrado</h2>
        </div>
        @endif
        {{-- Start form for students --}}
        <span class="text-xl font-bold mb-10">Datos del alumno</span>
        <hr class="bg-indigo-800 mt-3">
        <div class="mx-auto py-5">
            <livewire:view-student-data />
        </div>

        {{-- End form for students --}}
        {{-- Start fortm to Loans --}}
        <section>
            <livewire:view-book-details />
        </section>

        <div class="pt-10 flex justify-end">
            <input type="button" wire:click='processLoan'
                class="inline-flex uppercase items-center justify-center md:justify-start w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700"
                value="Enviar e Imprimir">
        </div>
    </div>
</div>