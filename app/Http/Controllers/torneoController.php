<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class torneoController extends Controller
{
    public function torneosHome()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $response = "null";
        $torneos = [];
        try {
            $response = $client->request('GET', 'test');
            $torneos = $client->request('GET', '');
        } catch (\Throwable $th) {
            return view('torneos', ['response' => $response, 'torneos' => $torneos]);
        }
        return view('torneos', ['response' => $response, 'torneos' => \json_decode($torneos->getBody())]);
    }
    public function torneoHome($id)
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $torneo = [];
        $torneos = [];
        try {
            $torneo = $client->request('GET', 'id/' . $id);
            $torneos = $client->request('GET', '');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('torneo', ['torneo' => \json_decode($torneo->getBody()), 'torneos' => \json_decode($torneos->getBody())]);
    }

    public function torneoEdit($id)
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $torneo = [];
        try {
            $torneo = $client->request('GET', 'id/' . $id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('editarTorneo', ['torneo' => \json_decode($torneo->getBody())]);
    }
    public function torneoEliminar($id)
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        try {
            $client->request('DELETE', 'delete/' . $id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('torneos.home');
    }

    public function nuevo()
    {
        return view('nuevoTorneo');
    }

    public function guardar(Request $request)
    {
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
                "informacion" => $request->informacion,
                "estado" => 0,
                "logo" => $image,
                "fecha" => (string) date('F, o')

            ]
        ]);
        return redirect()->route('torneos.home');
    }
    public function actualizar(Request $request)
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $image = $request->logo;
        if ($request->logoChanged == "1") {
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $image = $filename;
        }

        $response = $client->request('POST', 'update', [
            'json' => [
                "id" => $request->id,
                "nombre" => $request->name,
                "fecha" => $request->fecha,
                "informacion" => $request->informacion,
                "estado" => 0,
                "logo" => $image

            ]
        ]);
        return redirect()->route('torneos.home');
    }

    public function clasificatoria($id)
    {
        return view('clasificatoriaTorneo');
    }
    public function agregarequipo()
    {
        return view('agregarEquipo');
    }

    // Equipos


    public function equiposHome($id)
    {
        $client = new Client();
        $response = null;
        $equipos = null;
        $torneo = null;
        $torneos = null;

        try {
            $response = $client->get('http://localhost:8080/api/torneos/test');
            $equipos = $client->get('http://localhost:8080/api/equipos/get');
            $torneo = $client->get('http://localhost:8080/api/torneos/id/' . $id);
            $torneos = $client->get('http://localhost:8080/api/torneos/');
            $equipos = json_decode($equipos->getBody(), null);
            $torneo = json_decode($torneo->getBody(), null);
            $torneos = json_decode($torneos->getBody(), null);

            //verifica que el equipo pertenezca al torneo
            $equipos = array_filter($equipos, function ($equipo) use ($id) {
                return $equipo->torneo->id == $id;
            });

            //reordena los equipos para llenar los espacios del filtrado
            $equipos = array_values($equipos);

        } catch (\Throwable $th) {
            return view('equipos', ['response' => $response, 'equipos' => $equipos, 'torneo' => $torneo, 'torneos' => $torneos]);
        }

        return view('equipos', ['response' => $response, 'equipos' => $equipos, 'torneo' => $torneo, 'torneos' => $torneos]);
    }
    public function nuevoEquipo($id)
    {
        $torneos = null;
        $torneo = null;
        $client = new Client();

        try {
            $torneos = $client->get('http://localhost:8080/api/torneos/');
            $torneos = json_decode($torneos->getBody(), null);
            $torneo = $client->get('http://localhost:8080/api/torneos/id/' . $id);
            $torneo = json_decode($torneo->getBody(), null);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('nuevoEquipo', ['torneos' => $torneos, 'torneo' => $torneo]);
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
        $response = $client->post('http://localhost:8080/api/equipos/create', [
            'json' => [
                "nombre" => $request->nombre,
                "anioFundacion" => $request->anioFundacion,
                "pais" => $request->pais,
                "torneo" => $torneo,
                "idTorneo" => $request->idTorneo,
                "id_torneo" => $request->idTorneo,
                "urllogo" => $image
            ]
        ]);

        return redirect()->route('equipos.home', ['id' => $request->idTorneo]);
    }

    public function editarEquipo($id, $idEquipo)
    {
        $equipo = [];
        try {
            $equipo = DB::table('equipos')->where('id', $idEquipo)->get();
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('editarEquipo', ['equipo' => $equipo, 'idTorneo' => $id]);
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

    public function eliminarEquipo($id, $idEquipo)
    {

        $Client = new Client();

        try {
            $Client->delete('http://localhost:8080/api/equipos/delete/' . $idEquipo);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('equipos.home', ['id'=>$id]);

}
}