<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsedurController extends Controller
{

    public function index()
    {
        // Langsung mengembalikan view prosedur
        return view('prosedur');
    }
}
