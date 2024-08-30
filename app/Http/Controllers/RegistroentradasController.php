<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroentradasController extends Controller
{
      
   
     public function index(){
        return view('administrator.users.entradas');
     }
}
