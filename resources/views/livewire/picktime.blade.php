
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Generar Gráfica') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="mb-10 text-center text-2x1 mt-10 font-bold uppercase">{{ //'¡Bienvenido ' . Auth::user()->name
                    'Transformar datos en una representación gráfica'}}</h4>

                <div class="md:flex md:justify-center p-5 text-2xl flex-col w-full">
                <div><livewire:metodos-trimestres/></div>
                <div><livewire:metodos-tabla/></div>
                
                </div>
                
                
            </div>
        </div>
    </div>
</div>



   

