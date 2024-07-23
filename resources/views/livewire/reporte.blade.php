<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit.prevent='AgregarUsuario'>
        <div class="justify-center space-y-3" >
            <x-input-label for="no_control" :value="__('Numero de Control:')" class="uppercase" />
            <x-text-input id="no_control" class="block mt-1 w-full" type="text" wire:model="no_control" :value="old('no_control')"
                placeholder="Ej: 21CG0260" />
            <x-input-error :messages="$errors->get('no_control')" class="mt-2" />
                
            <x-input-label for="apellido_p" :value="__('Apellido Paterno:')" class="uppercase" />
            <x-text-input id="apellido_p" class="block mt-1 w-full" type="text" wire:model="apellido_p" :value="old('apellido_p')"
                placeholder="Ej: 21CG0260" />
            <x-input-error :messages="$errors->get('apellido_p')" class="mt-2" />
            
            <x-input-label for="apellido_m" :value="__('Apellido Materno:')" class="uppercase" />
            <x-text-input id="apellido_m" class="block mt-1 w-full" type="text" wire:model="apellido_m" :value="old('apellido_m')"
                placeholder="Ej: 21CG0260" />
            <x-input-error :messages="$errors->get('apellido_m')" class="mt-2" />
        
            <x-input-label for="sexo" :value="__('Sexo:')" class="uppercase" />
            <x-text-input id="sexo" class="block mt-1 w-full" type="text" wire:model="sexo" :value="old('sexo')"
                placeholder="Ej: 21CG0260" />
            <x-input-error :messages="$errors->get('sexo')" class="mt-2" />

            
            <x-input-label for="sexo" :value="__('Prueba:')" class="uppercase" />
            <x-text-input id="sexo" class="block mt-1 w-full" type="text" wire:model="sexo" :value="old('sexo')"
                placeholder="Ej: 21CG0260" />
            <x-input-error :messages="$errors->get('sexo')" class="mt-2" />    
        </div>
    </form>
</div>
