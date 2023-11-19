<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class torneoController extends Controller
{
    public function torneosHome(){
        return view('torneos');
    }
    public function torneoHome($id){
        return view('torneo');
    }

    public function nuevo(){
        return view('nuevoTorneo');
    }
}
