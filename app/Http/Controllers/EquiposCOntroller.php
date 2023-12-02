<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class EquiposCOntroller extends Controller
{
    

    public function equiposHome()
    {
        $client = new Client();
        $response = null;
        $equipos = null;
        $torneos = null;

        try {
            $response = $client->get('http://localhost:8080/api/torneos/test');
            $equipos = $client->get('http://localhost:8080/api/equipos/get');
            $torneos = $client->get('http://localhost:8080/api/torneos/');
            $equipos = json_decode($equipos->getBody(), null);
            $torneos = json_decode($torneos->getBody(), null);

            //reordena los equipos para llenar los espacios del filtrado
            $equipos = array_values($equipos);

        } catch (\Throwable $th) {
            return view('equipos', ['response' => $response, 'equipos' => $equipos, 'torneos' => $torneos]);
        }

        return view('equipos', ['response' => $response, 'equipos' => $equipos, 'torneos' => $torneos]);
    }

    public function verEquipo($id){
        
        $client = new Client();
        $response = null;
        $equipo = null;
        $torneo = null;

        try {
            $response = $client->get('http://localhost:8080/api/equipos/get/' . $id);
            $equipo = json_decode($response->getBody(), null);

            $torneo = $client->get('http://localhost:8080/api/torneos/');
            $torneo = json_decode($torneo->getBody(), null);
            $torneo = $torneo[0];

            //muestra en consola el equipo
            //rdd($equipo);

        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('equipo', ['equipo' => $equipo, 'torneo' => $torneo]);
    }
    public function nuevoEquipo()
    {
        $torneos = null;
        $torneo = null;
        $client = new Client();

        try {
            $torneos = $client->get('http://localhost:8080/api/torneos/');
            $torneos = json_decode($torneos->getBody(), null);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('nuevoEquipo', ['torneos' => $torneos]);
    }


    public function guardarEquipo(Request $request)
    {

        $torneo = null;

        $client = new Client();
        $torneo = $client->get('http://localhost:8080/api/torneos/id/' . $request->idTorneo);
        $torneo = json_decode($torneo->getBody(), null);


        //$image = 'https://cdn2.iconfinder.com/data/icons/flat-pro-imaging-set-2/32/image-canvas-512.png';
        if ($request->hasFile('img')) {
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $image = $filename;
        }

        $client = new Client();
        $response = $client->post('http://localhost:8080/api/equipos/create/'.$request->idTorneo, [
            'json' => [
                "nombre" => $request->nombre,
                "anioFundacion" => $request->anioFundacion,
                "pais" => $request->pais,
                "urllogo" => $image,
                "grupo" => $request->grupo,
                "puntos" => 0,
            ]
        ]);

        return redirect()->route('equipos.home');
    }

    public function editarEquipo($id, $idEquipo)
    {
        $equipo = [];
        try {

            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('editarEquipo');
    }

    public function actualizarEquipo(Request $request)
    {

        $Client = new Client();

        $torneo = null;

        try {
            $torneo = $Client->get('http://localhost:8080/api/torneos/id/' . $request->idTorneo);
            $torneo = json_decode($torneo->getBody(), null);

            //convierte idTorneo y puntos a int
            $puntosINT= (int)$request->puntos;

            //convierte anioFundacion a string
            $anioFundacionSTR= (string)$request->anioFundacion;

            $Client->put('http://localhost:8080/api/equipos/update/' . $request->idequipo, [
                'json' => [
                    "nombre" => $request->name,
                    "grupo" => $request->grupo,
                    "puntos" => $puntosINT,
                    "urllogo" => $request->urllogo,
                    "anioFundacion" => $request->anioFundacion,
                    "pais" => $request->pais
                ]
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('equipos.home');
    }

    public function eliminarEquipo($idEquipo)
    {

        $Client = new Client();

        try {
            $Client->delete('http://localhost:8080/api/equipos/delete/' . $idEquipo);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('equipos.home');

}

    public function jugadoresEquipo($id)
    {
        $client = new Client();
        $personas = "";

        try {
            $personas = $client->get('http://localhost:8080/api/personas/getByEquipo/' . $id);
            $personas = json_decode($personas->getBody(), null);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('jugadoresEquipo', ['personas' => $personas]);
    }

}
            
