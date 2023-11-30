<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function crearPersona(){
        return view('agregarJugador');
    }

    public function guardarPersona(Request $request){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);
        $image = 'blank.png';
        if ($request->hasFile('img')) {
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $image = $filename;
        }

        $response = $client->request('POST', 'crear', [
            'json' => [
                "nombre" => $request->name,
                "apellido" => $request->apellido,
                "fecha" => $request->fecha,
                "foto" => $image,
            ]
        ]);
        return redirect()->route('jugadores');
    }
}
