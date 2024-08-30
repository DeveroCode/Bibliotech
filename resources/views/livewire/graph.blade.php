<div flex flex-wrap>
    {{-- The best athlete wants his opponent at his best. --}} {{--md:flex md:justify-left p-5 text-2xl w-full md:w-1/2   w-full md:w-1/2--}}
 <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-center">
   <div class="md:grid md:grid-cols-1 gap-2">
    <div  class="custom-select">
      <select  name="combo" id="select-options" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
      px-10 py-8 rounded cursor-pointer uppercase w-full md:w-100 mb-1">
      <option value="">Seleccionar plazo</option> 
      <option value="1">ENE-MAR</option>
      <option value="2">ABR-JUN</option>
      <option value="3">JUL-SEP</option>
      <option value="4">OCT-DIC</option>
      <option value="5">AÑO</option>
    </select>
  </div>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Contador Público</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería en Gestión Empresarial</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería en Sistemas Computacionales</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Mecatrónica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Industrial</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Electromecánica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Electrónica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Todas las carreras</button>   
            
            
                
        </div> 
   </div> 
   
<div>
   <div class="bg-white h-screen flex justify-center items-center">
    <div><h5>Ing. en Sistemas<p>Computacionales<p></h5></div>
    <div class="flex flex-row justify-around w-full max-w-4xl">
      <!-- Barra 1 -->
      <div class="flex flex-col items-center">ISC
        <div class="bg-green-500 w-12 h-48"></div>
        <span class="text-black mt-2">50</span>
      </div>
  
      <!-- Barra 2 -->
      <div class="flex flex-col items-center">CP
        <div class="bg-blue-500 w-12 h-40"></div>
        <span class="text-black mt-2">40</span>
      </div>
  
      <!-- Barra 3 -->
      <div class="flex flex-col items-center">GE
        <div class="bg-red-500 w-12 h-20"></div>
        <span class="text-black mt-2">33</span>
      </div>
  
       <!-- Barra 4 -->
       <div class="flex flex-col items-center">II
        <div class="bg-pink-500 w-12 h-20"></div>
        <span class="text-black mt-2">32</span>
      </div>

       <!-- Barra 5 -->
       <div class="flex flex-col items-center">IM
        <div class="bg-yellow-500 w-12 h-20"></div>
        <span class="text-black mt-2">30</span>
      </div>

      <!-- Barra 6 -->
      <div class="flex flex-col items-center">IEM
        <div class="bg-purple-500 w-12 h-28"></div>
        <span class="text-black mt-2">25</span>
      </div>
      
      <!-- Barra 7 -->
      <div class="flex flex-col items-center">IE
        <div class="bg-gray-500 w-12 h-20"></div>
        <span class="text-black mt-2">14</span>
      </div>
    </div>
    Libros en Total
  </div>

        
        <div class="flex flex-wrap">
          <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-right">
           
              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">Cantidad de libros solicitados</h2>
              <label class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-10">Nombre de carrera</label>
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
            
      </div>
<button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
   px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Exportar</button>
 </div>
</div>
