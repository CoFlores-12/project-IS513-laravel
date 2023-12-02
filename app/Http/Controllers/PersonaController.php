<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function crearPersona(){
        $client = new Client();
        $equipos = "";
        $roles = "";
        try {
            $equipos = $client->get('http://localhost:8080/api/equipos/get');
            $roles = $client->get('http://localhost:8080/api/personas/getRoles')->getBody();
        } catch (\Throwable $th) {
            view('personas', ['equipos' => $equipos, "roles"=>$roles]);
        }
        return view('agregarJugador', ['equipos' => \json_decode($equipos->getBody()),'roles' => \json_decode($roles)]);
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
                "idrol" => $request->idrol,
                "idequipo" => $request->idequipo
            ]
        ]);
        return redirect()->route('jugadores');
    }

    public function verPersonas(){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);
        $personas = "";
        try {
            $personas = $client->request('GET', '');
        } catch (\Throwable $th) {
            view('personas', ['personas' => $personas]);
        }
        return view('personas', ['personas' => \json_decode($personas->getBody())]);
    }
    public function verPersona($id){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);
        $persona = "";
        $goles = "";
        $partidos = "";
        $transfers = "";
        try {
            $persona = $client->request('GET', 'get/'.$id);
            $goles = $client->request('GET', 'goles/'.$id);
            $partidos = $client->request('GET', 'partidos/'.$id);
            $transfers = $client->request('GET', 'transfers/'.$id);
        } catch (\Throwable $th) {
            view('persona', ['persona' => $persona]);
        }
        return view('persona', ['persona' => \json_decode($persona->getBody()),'goles' => \json_decode($goles->getBody()),'partidos' => \json_decode($partidos->getBody()),'fichajes' => \json_decode($transfers->getBody())]);
    }

    public function transferirPersona($id){
        $client = new Client();
        $equipos = "";
        $persona = "";
        try {
            $equipos = $client->get('http://localhost:8080/api/equipos/get');
            $persona = $client->get('http://localhost:8080/api/personas/get/'.$id);
        } catch (\Throwable $th) {
            view('personas', ['equipos' => $equipos]);
        }
        return view('transferir', ['equipos' => \json_decode($equipos->getBody()),'persona' => \json_decode($persona->getBody())]);
    }

    public function transferirPersonaPost(Request $request){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);

        $response = $client->request('POST', 'transferir', [
            'json' => [
                "idpersona" => $request->idpersona,
                "idequipoout" => $request->idequipoout,
                "precio" => $request->precio,
                "idequipoin" => $request->idequipoin
            ]
        ]);
        return redirect()->route('jugadores');
    }
}
