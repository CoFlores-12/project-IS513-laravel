<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PersonaController extends Controller
{



    // public function index(){
    //     $personas = Personas::all();
    //     return view('jugadores',compact('personas'));
    // } 

    public function personasHome()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);
        $response = "null";
        $personas = [];
        try {
            $response = $client->request('GET', 'test');
            $personas = $client->request('GET', '');
        } catch (\Throwable $th) {
            return view('jugadores', ['response' => $response, 'jugadores' => $personas]);
        }
        return view('jugadores', ['response' => $response, 'jugadores' => \json_decode($personas->getBody())]);
    }


    public function crearPersona(){
        return view('agregarJugador');
    }
    public function guardar(Request $request){
        
        $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/crear']);
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
                "foto" => $image,


            ]
        ]);
        return redirect()->route('persona.home');
    }
    /*public fuction eliminarPersona(){
        return view ('jugadores')
         $client = new Client(['base_uri' => 'http://localhost:8080/api/personas/']);
        try {
            $client->request('DELETE', 'delete/' . $id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('personas.home');
    }

    
    public function editarPersona($id, $idJugador)
    {
        $jugador = [];
        try {
            $jugador = DB::table('personas')->where('id', $idpersona)->get();
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('historialJugador', ['Jugador' => $Jugador, 'idPersona' => $id]
    }
     public function actualizarJugador(Request $request)
    {

        $Client = new Client();

        $torneo = null;

        try {
            $persona = $Client->get('http://localhost:8080/api/fichajeJugador/' . $request->equipoin);
            $torneo = json_decode($torneo->getBody(), null);

            $Client->put('http://localhost:8080/api/jugador/update/' . $request->equipoout, [
                'json' => [
                    "nombre" => $request->name,
                    "idEquipoIn" => $request->idEquipoIn,
                    "idEquipoOut" => $request->idEquipoOut,
                    "precio" => $request->precio
                ]
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('jugadores.home', ['id' => $request->idPersonas]);
    }

}*/
}
