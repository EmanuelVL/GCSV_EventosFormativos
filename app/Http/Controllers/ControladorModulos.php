<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\EventoFormativo;
use App\Usuario;
use App\Instructor;
use App\tipoEvento;
use App\Modulo;
use App\Rules\EventoFormativo as AppEventoFormativo;
use App\Documento;


class ControladorModulos extends Controller
{
    public function store(Request $request){
       
   
        
            $modulo = new Modulo();
            $modulo ->idEF = 1;
            $modulo ->nombreModulo = $request->input('nombreModulo');
            $modulo ->contenidoMod= $request->input('contenidoModulo');
            $modulo ->duracionMod = $request->input('duracion');
          
            
            $modulo ->save();
        
            return redirect()->route('gestioneventos.index');
        
    
    }

    public function show($idEF)
    {
        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $modulos = Modulo::where('idEF', $idEF)->firstOrFail();

        return view('eventos.modulosEvento', compact('evento','modulos'));
    }
}