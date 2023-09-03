<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationsController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function __construct()
    {
        $this->middleware(['auth', 'statusCheck']);
    }
    
    public function __invoke(Request $request)
    {
        return view('informations.index');
    }
}
