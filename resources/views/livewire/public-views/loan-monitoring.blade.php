<div class="bg-white p-4 rounded-lg w-full max-w-md mx-auto h-auto">
    <section class="py-5 px-4 sm:px-0">
        <h2 class="text-3xl font-bold text-center p-3">Seguimiento de préstamos</h2>
        <p class="text-[15px] text-center text-gray-500 leading-none p-3">
            Introduzca su número de folio para verificar el estado actual de su préstamo
        </p>
    </section>

    <section class="sm:px-28 md:px-5">
        <livewire:search-loans />
    </section>

    @if (!empty($prestamos))
    <section class="bg-gray-100 shadow-md p-5 rounded-md max-w-md mx-auto py-10 mb-10 w-full">
        <div>
            <h3 class="text-2xl font-bold">Estado del préstamo</h3>
            <p class="text-sm text-gray-600">
                <span>{{ $prestamos->alumnos()->first()->nombre }}</span> a continuación se muestra el estado actual de su préstamo
            </p>

            <div class="flex flex-col sm:flex-row justify-between py-10 space-y-6 sm:space-y-0 sm:space-x-6">
                <div class="flex flex-col">
                    <p class="font-bold text-md leading-none">Salida</p>
                    <span class="text-[14px]">{{ Carbon\Carbon::parse($prestamos->fecha_inicio)->format('d/m/Y') }}</span>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold text-md leading-none">Entrega</p>
                    <span class="text-[14px]">{{ Carbon\Carbon::parse($prestamos->fecha_limite)->format('d/m/Y') }}</span>
                </div>
            </div>

            <section class="space-y-4">
                <p class="text-xl font-bold">Actualizaciones</p>
                @if ($estado === 'entregado')
                <div class="flex flex-row items-center space-x-5 relative z-10">
                    <div class="bg-indigo-700 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fa-solid fa-cloud text-white border-none"></i>
                    </div>
                    <div>
                        <p class="text-[15px] mt-2 leading-none">Tu libro ha sido {{ $estado }} con éxito</p>
                        <span class="text-xs block leading-1">{{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                    </div>
                </div>
                @elseif ($estado === 'pendiente de entrega')
                <div class="flex flex-row items-center space-x-5 relative z-10">
                    <div class="bg-indigo-700 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fa-solid fa-cloud-sun-rain text-white border-none"></i>
                    </div>
                    <div>
                        <p class="text-[15px] mt-2 leading-none">El libro está en {{ $estado }}</p>
                        <span class="text-xs block leading-1">{{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                    </div>
                </div>
                @elseif ($estado === 'vencido')
                <div class="flex flex-row items-center space-x-5 relative z-10">
                    <div class="bg-indigo-700 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fa-solid fa-cloud-moon-rain text-white border-none"></i>
                    </div>
                    <div>
                        <p class="text-[15px] mt-2 leading-none">{{ $estado }}</p>
                        <span class="text-xs block leading-1">{{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                    </div>
                </div>
                @endif
            </section>
        </div>
    </section>
    @endif
</div>

{{-- Validate the input --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const folio = document.querySelector('#folio');
    const btn = document.querySelector('#btnFolio');

    btn.addEventListener('click', () => {
        if(folio.value === ''){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Es necesario que ingrese un folio correcto",
            });
        }
    });
</script>
@endpush
