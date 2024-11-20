<?php

namespace App\Http\Controllers;

class RegistroentradasController extends Controller
{
    public function index()
    {
        return view('administrator.users.entradas');
    }
}
