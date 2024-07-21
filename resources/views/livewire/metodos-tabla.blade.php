<section class="flex flex-col justify-center items-center mx-6" {{-- "flex bg-red-900 justify-center flex-row mx-auto item-center" --}}>
    <livewire:metodos-trimestres>

    @if(count($prestamos) > 0)
        <table class="table-auto text-xs w-full m-auto border-collapse border bg-white text-left text-gray-500 justify-center">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/4 px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Carrera</th>
                    <th class="w-3/6 px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Libro</th>
                    <th class="px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Cantidad/Préstamos</th>
                    
                </tr>
                
            </thead>
            @foreach($prestamos as $prestamo)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50 border">
                   
                    <th class="flex gap-3 px-3 py-2 font-normal text-gray-900">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize"></div>
                            <div class="text-gray-400 capitalize">
                                {{$prestamo->libro->categoria->categoria}}
                                
                            </div>
                        </div>
                    </th>

                   
                    <td class="table-cell px-6 py-4 border">
                        {{$prestamo->libro->titulo}}
                    </td>

                    <td class="table-cell px-6 py-4 border">
                        {{$prestamo->total_prestamos}}
                    </td>
                    </tr>

            </tbody>
            @endforeach
        </table> 
    @endif
</section>
            



{{-- <section class="flex flex-row mx-auto grid-item-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-right">
           
        <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4 text-2xl">Cantidad de libros solicitados</h3>
        <label class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-9">Nombre de carrera</label>
        <table style="width: 100%; border-collapse: collapse;">
          
    <tr style=" background-color: #f2f2f2;">
         <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="font-semibold text-xl text-gray-800  leading-tight">Carrera</th>
         <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="font-semibold text-xl text-gray-800  leading-tight">Libro</th>
         <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="font-semibold text-xl text-gray-800  leading-tight">Cantidad Solicitados</th>
    </tr>
    <tr style=" background-color: #f2f2f2;">                                                    
         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Contador Público</td>
         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
         <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">63</td> 
    </tr>
    <tr style=" background-color: #f2f2f2;">                                                    
      <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Contador Público</td>
      <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">programacion orientada a objetos</td>
      <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">5</td> 
 </tr>
    <tr style=" background-color: #f2f2f2;">                                                    
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. en Gestión Empresarial</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">18</td>    
   </tr>
    <tr style=" background-color: #f2f2f2;">
         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Electromecánica</td>
         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
         <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">12</td>
    </tr>
    <tr style=" background-color: #f2f2f2;">
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Industrial</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">35</td>
   </tr>
    <tr style=" background-color: #f2f2f2;">
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. en Sistemas Computacionales</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">22</td>
   </tr>
   <tr style=" background-color: #f2f2f2;">
    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Mecatrónica</td>
    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
    <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">17</td>
</tr>
</tr>
<tr style=" background-color: #f2f2f2;">
<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Electromecánica </td>
<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">teoría de laravel</td>
<td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">17</td>
</tr>
        </table>   
    </div>
</section>
 --}}