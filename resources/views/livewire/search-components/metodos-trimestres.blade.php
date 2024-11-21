<div class="py-10">
  <div class="max-w-7xl mx-auto">
      <form  wire:submit.prevent='searchWord'>
           <div class="md:grid md:grid-cols-3 gap-5 "> 
        
              <div class="mb-5">
                  <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Plazo</label>
                  <select id="trimestre" class="border-gray-300 p-2 w-full rounded-md" wire:model="plazo">
                      <option  value="0">--Seleccione--</option>
                      <option value="1">Enero - Marzo</option>
                      <option value="2">Abril - Junio</option>
                      <option value="3">Julio - Septiembre</option>
                      <option value="4">Octubre - Diciembre</option>
                  </select>
              </div>
              <div class="mb-5">
                  <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Carrera</label>
                  <select id="carreras" class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria">
                      <option  value="0">--Seleccione--</option>
              
                      @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                       @endforeach
                     
                  </select>
                  
              </div>

              <div class="mt-1 flex space-x-3 items-center">
                <button id="btnCheck" {{-- onclick="valida()" --}}
                    class="bg-indigo-600 hover:bg-indigo-800 transition-colors font-bold text-white text-sm px-5 py-2 rounded-lg uppercase cursor-pointer flex items-center">
                    <i class="fa-solid fa-magnifying-glass fa-flip-horizontal mr-2"></i>
                    Mostrar
                </button>
            
                <button wire:click="export"
                    class="bg-indigo-600 hover:bg-indigo-800 transition-colors font-bold text-white text-sm px-5 py-2 rounded-lg uppercase cursor-pointer flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    Descargar
                    <input type="file" class="hidden" />
                </button>
            </div>
              {{-- <div class="mt-5 item-center space-x-3">
              <button id="btnCheck" onclick="valida()"
              class="bg-indigo-600 transition-colors font-bold px-7 rounded uppercase md:w-auto item-center text-sm px-2cs py-2 bg-blue text-white rounded-lg cursor-pointer inline-flex">
                {{--class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-8 rounded cursor-pointer uppercase py-2 md:w-auto">--}}                  
               {{--  <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
                  Mostrar --}}
              {{-- </button> --}}
            {{-- 
              <button wire:click="export"
              class="bg-indigo-600 transition-colors font-bold px-7 rounded uppercase md:w-auto item-center text-sm px-2cs py-2 bg-blue text-white rounded-lg cursor-pointer inline-flex">
              <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path
                      d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="ml-1 text-base leading-normal uppercase">Descargar</span>
              <input type='file' class="hidden"/>
          </button> --}}

          {{-- </div> --}}
          </div>

          
      </form>
  </div>
  {{-- 04/11/2024 --}}
  @if ($found)
    <div x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)" x-show="showAlert"
        class="bg-red-100 border border-red-600 text-red-600 font-bold p-2 my-3 text-center">
        <h2 class="text-xl">{{ $statusMessage }}</h2>
    </div>
@endif
</div>




{{-- @push('scripts') --}}
{{-- Sweet Alert CDN --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script> --}}
   
   {{-- function valida(){
        const trimestre = document.querySelector('#trimestre');
        const carreras = document.querySelector('#carreras');
        
        const btn = document.querySelector('#btnCheck');

        console.log(trimestre.value)
        if(trimestre.value == 0 || carreras.value == 0 ){
            Swal.fire({
            icon: "warning",
            title: "Alerta!",
            text: "seleccione más de un campo para realizar la búsqueda",
            confirmButtonColor: '#007BFF',  // Cambiar color del botón
            confirmButtonText: 'OK',
            });
        }
   } --}}
{{-- </script>
@endpush --}}

