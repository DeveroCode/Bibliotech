<div class="max-w-7xl mx-auto">
    <form wire:submit.prevent="leerDatosBuscar" class="flex flex-wrap justify-between items-center" id="search-form">
        <div class="mb-5 w-full md:w-1/3 md:mr-4">
            <input type="text" placeholder="No. Control" name="word"
                class="rounded-md shadow-sm border-indigo-500 focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                wire:model="no_institucional" id="no_institucional">
        </div>
        @error('word') <span class="error text-red-500">{{ $message }}</span> @enderror
        <div>
            <input type="submit"
                class="inline-flex items-center w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700 text-center"
                value="Buscar" id="btnBuscar">
        </div>
    </form>

    <div id="alert" data-found="{{ $found }}"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', () =>  {
        const $ = element => document.querySelector(element);
        const $no_institucional = $('#no_institucional');
        const $form = $('#search-form');


        $form.addEventListener('submit', showAlerts);

       function showAlerts(e){
        e.preventDefault();
        const $found  = $('#alert').getAttribute('data-found');
        if ($no_institucional.value.trim() === '') {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor ingrese un No. Control válido!"
            });
        }
       }
    })
</script>
@endpush