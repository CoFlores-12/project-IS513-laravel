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
        $torneo = null;
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


        $image = 'https://cdn2.iconfinder.com/data/icons/flat-pro-imaging-set-2/32/image-canvas-512.png';
        if ($request->hasFile('img')) {
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            //$image = $filename; para probar un placeholder en su lugar
        }

        $client = new Client();
        //TODO: implement endpoint
        $response = $client->post('http://localhost:8080/api/equipos/create/'.$request->idTorneo, [
            'json' => [
                "nombre" => $request->nombre,
                "anioFundacion" => $request->anioFundacion,
                "pais" => $request->pais,
                "urllogo" => $image,
                "grupo" => $request->grupo,
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

            $Client->put('http://localhost:8080/api/equipos/update/' . $request->idequipo, [
                'json' => [
                    "nombre" => $request->name,
                    "idTorneo" => $request->idTorneo,
                    "torneo" => $torneo,
                    "urllogo" => $request->urllogo,
                    "anioFundacion" => $request->anioFundacion,
                    "pais" => $request->pais
                ]
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('equipos.home', ['id' => $request->idTorneo]);
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
}
