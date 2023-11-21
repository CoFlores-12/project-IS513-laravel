<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class torneoController extends Controller
{
    public function torneosHome(){
        $client = new Client();
        $response = "null";
        $torneos = [];
        try {
            $response = Http::get('http://localhost:8080/api/torneos/test');
            $torneos = Http::get('http://localhost:8080/api/torneos/');
        } catch (\Throwable $th) {
            return view('torneos', ['response'=>$response, 'torneos'=> $torneos]);
        }
        return view('torneos', ['response'=>$response,'torneos'=> \json_decode($torneos)]);
    }
    public function torneoHome($id){
        $torneo = [];
        $torneos = [];
        try {
            $torneo = Http::get('http://localhost:8080/api/torneos/id/'.$id);
            $torneos = Http::get('http://localhost:8080/api/torneos/');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('torneo', ['torneo'=> \json_decode($torneo),'torneos'=> \json_decode($torneos)]);
    }

    public function torneoEdit($id){
        $torneo = [];
        try {
            $torneo = Http::get('http://localhost:8080/api/torneos/id/'.$id);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('editarTorneo', ['torneo'=> \json_decode($torneo)]);
    }
    public function torneoEliminar($id){
        try {
            Http::delete('http://localhost:8080/api/torneos/delete/'.$id);
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
        $image = 'blank.png';
        if($request->hasFile('img')){
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath,$filename);
            $image = $filename;
        }

        $response = Http::post('http://localhost:8080/api/torneos/create', [
                "nombre"=> $request->name,
                "titulo"=> $request->title,
                "informacion"=> $request->informacion,
                "estado"=> 0,
                "logo"=> $image
            
        ]);
        return redirect()->route('torneos.home');
    }
    public function actualizar(Request $request){
        $image = $request->logo;
        if($request->logoChanged == "1"){
            $destinationPath = 'client';
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath,$filename);
            $image = $filename;
        }

        $response = Http::post('http://localhost:8080/api/torneos/update', [
                "id" => $request->id,
                "nombre"=> $request->name,
                "titulo"=> $request->title,
                "informacion"=> $request->informacion,
                "estado"=> 0,
                "logo"=> $image
            
        ]);
        return redirect()->route('torneos.home');
    }

    /*
        $response = Http::get('http://localhost:8080/api/torneos');
        $response = Http::post('http://localhost:8080/api/torneos', [
            'name' => 'name',
            'role' => 'Network',
        ]);
    */
}
