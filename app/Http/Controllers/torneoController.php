<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class torneoController extends Controller
{
    public function torneosHome(){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $response = "null";
        $torneos = [];
        try {
            $response = $client->request('GET', 'test');
            $torneos = $client->request('GET', '');
        } catch (\Throwable $th) {
            return view('torneos', ['response'=>$response, 'torneos'=> $torneos]);
        }
        return view('torneos', ['response'=>$response,'torneos'=> \json_decode($torneos->getBody())]);
    }
    public function torneoHome($id){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $torneo = [];
        $torneos = [];
        try {
            $torneo = $client->request('GET', 'id/'.$id);
            $torneos = $client->request('GET', '');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('torneo', ['torneo'=> \json_decode($torneo->getBody()),'torneos'=> \json_decode($torneos->getBody())]);
    }

    public function torneoEdit($id){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $torneo = [];
        try {
            $torneo = $client->request('GET', 'id/'.$id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('editarTorneo', ['torneo'=> \json_decode($torneo->getBody())]);
    }
    public function torneoEliminar($id){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        try {
            $client->request('DELETE', 'delete/'.$id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('torneos.home');
    }

    public function nuevo(){
        return view('nuevoTorneo');
    }

    public function guardar(Request $request){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $image = 'blank.png';
        if($request->hasFile('img')){
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath,$filename);
            $image = $filename;
        }

        $response = $client->request('POST', 'create', [
            'json'=>[
                "nombre"=> $request->name,
                "titulo"=> $request->title,
                "informacion"=> $request->informacion,
                "estado"=> 0,
                "logo"=> $image
            
        ]]);
        return redirect()->route('torneos.home');
    }
    public function actualizar(Request $request){
        $client = new Client(['base_uri' => 'http://localhost:8080/api/torneos/']);
        $image = $request->logo;
        if($request->logoChanged == "1"){
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath,$filename);
            $image = $filename;
        }

        $response =$client->request('POST', 'update', [
            'json'=>[
                "id" => $request->id,
                "nombre"=> $request->name,
                "titulo"=> $request->title,
                "informacion"=> $request->informacion,
                "estado"=> 0,
                "logo"=> $image
            
        ]]);
        return redirect()->route('torneos.home');
    }

}
