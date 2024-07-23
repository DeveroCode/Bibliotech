<div>
    {{-- Stop trying to control. --}}
    <livewire:search-user />
       
     @if (count($alumno) > 0 )
     <form wire:submit.prevent='insert'>

        <div class="justify-center space-y-3" >
            <x-input-label for="no_institucional" :value="__('Numero de Control:')" class="uppercase" />
            <x-text-input id="no_institucional" class="block mt-1 w-full" type="text" wire:model="no_institucional" :value="$alumno[0]->no_institucional" 
                placeholder="Ej: 21CG0160" />
            <x-input-error :messages="$errors->get('no_institucional')" class="mt-2" />
        
            <x-input-label for="nombre" :value="__('Nombre:')" class="uppercase" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre" :value="$alumno[0]->nombre" 
               placeholder="Ej: María" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />

            <x-input-label for="apellidoP" :value="__('Apellido Paterno:')" class="uppercase" />
            <x-text-input id="apellidoP" class="block mt-1 w-full" type="text" wire:model="apellidoP" :value="$alumno[0]->apellidoP" 
                placeholder="Ej: López" />
            <x-input-error :messages="$errors->get('apellidoP')" class="mt-2" />
            
            <x-input-label for="apellidoM" :value="__('Apellido Materno:')" class="uppercase" />
            <x-text-input id="apellidoM" class="block mt-1 w-full" type="text" wire:model="apellidoM" :value="$alumno[0]->apellidoM" 
                placeholder="Ej: Rodriguez" />
            <x-input-error :messages="$errors->get('apellidoM')" class="mt-2" />
        
            <x-input-label for="sexo" :value="__('Sexo:')" class="uppercase" />
                <select id="sexo" class="border-gray-300 p-2 w-full rounded-md" wire:model="sexo" :value="$this->sexo" >
                   <option value="0">--Seleccione--</option>
                   <option value="hombre">Hombre</option>
                   <option value="mujer">Mujer</option>
                   <option value="otro">otro</option>
                
                </select>
            <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
           
            <x-input-label for="carrera" :value="__('Carrera:')" class="uppercase" />
                <select class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria" :value="$this->carrera" >
                    <option value="0">--Seleccione--</option>
                @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach   
                </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />   
                
            <x-input-label for="materia" :value="__('Materia:')" class="uppercase" />
            <x-text-input id="materia" class="block mt-1 w-full" type="text" wire:model="materia" :value="$this->materia"
                placeholder="Ej: Calculo Diferencial" />
            <x-input-error :messages="$errors->get('materia')" class="mt-2" />     
             
            <x-input-label for="actividad" :value="__('Actividad:')" class="uppercase" />
                <select id="actividad" class="border-gray-300 p-2 w-full rounded-md" wire:model="actividad" :value="$this->actividad">
                   <option value="0">--Seleccione--</option>
                  
                   @foreach ($actividades as $actividad )
                            <option value="{{ $actividad->id }}">{{ $actividad->name }}</option>
                   @endforeach
                </select>
            <x-input-error :messages="$errors->get('actividad')" class="mt-2" />
              
            <input type="submit" class="inline-flex items-center w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white 
            no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none 
            sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 
            focus-within:border-blindigoue-700 text-center" value="Registrar">
        </div>
      </form>
     @endif
  
</div>
