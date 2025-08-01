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
            <input type="button" wire:click='processLoan' wire:loading.attr="disabled" wire:target="processLoan"
                class="inline-flex uppercase items-center justify-center md:justify-start w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700" :class="{'opacity-50 cursor-not-allowed': $wire.loading}"
                value="Enviar e Imprimir">

        </div>

        {{-- Spinner --}}
        <div wire:loading wire:target="processLoan" class="flex justify-center mt-4">
            <svg class="animate-spin h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.372 0 0 5.372 0 12h4z" />
            </svg>
            <span class="ml-2 text-indigo-700 font-semibold">Procesando préstamo...</span>
        </div>

    </div>
</div>