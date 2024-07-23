<div>
    {{-- The whole world belongs to you. --}}
    
    <form action="" class="w-100">

            <div class="flex flex-wrap">
                <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-left mr-40">
                  <div class="md:grid md:grid-cols-1 gap-2">
                          <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Carrera</button>
                          <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Sexo</button>
                          <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Fecha</button>
                          <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Materia o Actividad</button>
                          <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Corte Semestral</button>
                        </div> 
                    </div>
                    <div class="flex flex-wrap">
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-right mb-20">
                     
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-10">Datos de los usuarios flitrados por "Carrera":</h2>

                        <table style="width: 100%; border-collapse: collapse;">
                    <tr style=" background-color: #f2f2f2;">
                         <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="font-semibold text-xl text-gray-800  leading-tight">Carrera</th>
                         <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="font-semibold text-xl text-gray-800  leading-tight">Cantidad de Usuarios</th>
                    </tr>
                    <tr style=" background-color: #f2f2f2;">                                                    
                         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Contador Público</td>
                         <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">63</td> 
                    </tr>
                    <tr style=" background-color: #f2f2f2;">                                                    
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. en Gestión Empresarial</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">18</td>    
                   </tr>
                    <tr style=" background-color: #f2f2f2;">
                         <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Electromecánica</td>
                         <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">12</td>
                    </tr>
                    <tr style=" background-color: #f2f2f2;">
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Industrial</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">35</td>
                   </tr>
                    <tr style=" background-color: #f2f2f2;">
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. en Sistemas Computacionales</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">22</td>
                   </tr>
                   <tr style=" background-color: #f2f2f2;">
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;" class="text-sm font-bold">Ing. Mecatrónica</td>
                    <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;" class="text-sm font-bold">17</td>
               </tr>
                        </table>   
                    </div> 
                  <div class="w-50">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
                           px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Exportar</button>
                   </div> {{--Llave div boton exportar--}}       
                </div>

           </div>


           <!-- resources/views/chart/index.blade.php -->
     <div class="flex flex-wrap">
       <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-right">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-10 ml-60 pl-50">Gráfico de los usuarios flitrados por "Carrera":</h2>
     
           <div class="bg-white h-screen flex justify-right items-right">
               <p style="" class="font-semibold text-xl text-gray-800  leading-tight ml-20 p-20">Usuarios por carrera</p><br>    
               <div class="flex flex-row justify-around w-80 max-w-6xl">
                 <!-- Barra 1 -->
                 <div class="flex flex-col items-center">CP
                   <div class="bg-green-500 w-8 h-48"></div>68
                   <span class="text-black mt-2"></span>
                 </div>
             
                 <!-- Barra 2 -->
                 <div class="flex flex-col items-center">IGM
                   <div class="bg-blue-500 w-8 h-24"></div>18
                   <span class="text-black mt-2"></span>
                 </div>
             
                 <!-- Barra 3 -->
                 <div class="flex flex-col items-center">IE
                   <div class="bg-red-500 w-8 h-20"></div>12
                   <span class="text-black mt-2"></span>
                 </div>
             
                   <!-- Barra 4 -->
                   <div class="flex flex-col items-center">II
                    <div class="bg-purple-500 w-8 h-40"></div>35
                    <span class="text-black mt-2"></span>
                  </div>

                   <!-- Barra 5 -->
                   <div class="flex flex-col items-center">ISC
                    <div class="bg-gray-500 w-8 h-20"></div>22
                    <span class="text-black mt-2"></span>
                  </div>

                   <!-- Barra 5 -->
                   <div class="flex flex-col items-center">IM
                    <div class="bg-pink-500 w-8 h-20"></div>17
                    <span class="text-black mt-2"></span>
                  </div>
                 <!-- Más barras según sea necesario... -->
               </div>
             </div>
          </div>

         <!-- <livewire:Users> como se llama una vista que ya cree-->

     </div>   
           
   </form>


</div>

