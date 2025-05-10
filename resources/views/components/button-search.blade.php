<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 h-10 rounded cursor-pointer uppercase mt-1 flex items-center']) }}><i class="fa-solid fa-magnifying-glass mr-2"></i>{{ $slot }}</button>

