<div class="w-full">
  <div class="md:flex md:justify-center p-5 text-2xl">
    <div class="w-full">
      <div class="flex flex-wrap justify-center">
        {{-- Inventory --}}
        <div class="w-full md:w-1/4 bg-white rounded-lg border border-gray-200 shadow-md mb-6 md:mr-6 md:mb-0">
          <div class="flex flex-col items-center pb-10">
            <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mt-5 mb-5">
              <i class="fa-solid fa-bookmark text-indigo-700"></i>
            </div>
            <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Inventario</h3>
            <div class="flex mt-4 space-x-3 lg:mt-6">
              <a type="submit" href="{{ route('dashboard.printPDF') }}" target="_blank"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 uppercase">pdf</a>
              <a href="{{ route('dashboard.pie') }}"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-indigo-100 focus:ring-4 focus:ring-indigo-300 uppercase">Pie
                de pagina</a>
            </div>
          </div>
        </div>
        {{-- Loans --}}
        <div class="w-full md:w-1/4 bg-white rounded-lg border border-gray-200 shadow-md mb-6 md:mr-6 md:mb-0">
          <div class="flex flex-col items-center pb-10">
            <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mt-5 mb-5">
              <i class="fa-solid fa-arrow-up-from-bracket text-indigo-700"></i>
            </div>
            <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Préstamos</h3>
            <div class="max-w-md text-center break-words">
              <span class="text-sm text-gray-500"></span>
            </div>
            <div class="flex mt-4 space-x-3 lg:mt-6">
              <a href="#"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-blueindigo-300 uppercase">pdf</a>
              <a href="#"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-indigo-100 focus:ring-4 focus:ring-indigo-300 uppercase">Excel</a>
            </div>
          </div>
        </div>
        {{-- missing --}}
        <div class="w-full md:w-1/4 bg-white rounded-lg border border-gray-200 shadow-md mb-6 md:mr-6 md:mb-0">
          <div class="flex flex-col items-center pb-10">
            <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mt-5 mb-5">
              <i class="fa-solid fa-ghost text-indigo-700"></i>
            </div>
            <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Faltantes</h3>
            <div class="max-w-md text-center break-words">
              <span class="text-sm text-gray-500"></span>
            </div>
            <div class="flex mt-4 space-x-3 lg:mt-6">
              <a href="#"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 uppercase">pdf</a>
              <a href="#"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-indigo-100 focus:ring-4 focus:ring-indigo-300 uppercase">Excel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>