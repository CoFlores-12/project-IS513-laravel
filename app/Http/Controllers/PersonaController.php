<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function crearPersona(){
        return view('agregarJugador');
    }
    public function guardar(Request $request){
        
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $image = 'blank.png';
        if ($request->hasFile('img')) {
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $image = $filename;
        }

        $response = $client->request('POST', 'create', [
            'json' => [
                "nombre" => $request->name,
                "apellido" => $request->apellido,
                "foto" => $image

            ]
        ]);
        return redirect()->route('torneos.home');
    }
}
