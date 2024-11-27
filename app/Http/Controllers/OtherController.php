<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function show()
    {

        return view('administrator.others.Layout');
    }
}
