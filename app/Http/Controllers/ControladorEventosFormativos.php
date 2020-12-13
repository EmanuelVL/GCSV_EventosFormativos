<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\EventoFormativo;
use App\Usuario;
use App\Instructor;
use App\tipoEvento;
use App\Rules\EventoFormativo as AppEventoFormativo;
use App\Documento;
use App\Modulo;

class ControladorEventosFormativos extends Controller
{

    /**
     * Funcion que se encarga de desplegar 5 categorias y despues paginarlas en la vista listaCategorias.
     * @return vista con todas las categorias.
     *
     */
    public function index()
    {
        $eventof= EventoFormativo::all();

        return view('eventos.eventos')->with(['EventoFormativo'=>$eventof]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios= Usuario::all();
        $instructor = Instructor::all();
        $tipoEvento = tipoEvento::all();
        // dd($academicos);
        // $academicoConCategoria = Academico::has('categoria')->get();
        //$academicoSinCategoria = Academico::doesnthave('categoria')->get();

        return view('eventos.crearEvento',compact('usuarios','instructor','tipoEvento'));
    }
     public function lista()
    {
        $academicos= Academico::all();
        // dd($academicos);
        // $academicoConCategoria = Academico::has('categoria')->get();
        $academicoSinCategoria = Academico::doesnthave('categoria')->get();

        return view('categorias.crearCategoria',compact('academicoSinCategoria'));
    }

    /**
     * Funcion que se encarga de crear el objeto de tipo categoria, valida que los datos ingresados por el usuario
     * sean los correctos,si no, regresa un error a la vista, si la validacion pasa  llena los atributos de ese objeto
     * con los datos que ingresa el usuario y despues lo guarda en la base de datos
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->input('fechaInicio') > $request->input('fechaFinal')){
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withErrors(['email'=> 'La fechea de inicio es mayor a la fecha final!']);

        }





        $credentials=1;

        if($credentials){
            $eventoFormativo = new EventoFormativo();
            $eventoFormativo ->nombreEF = $request->input('nombreEvento');
            $eventoFormativo ->descripcion = $request->input('descripcionEvento');
            $eventoFormativo ->fechaInicio= $request->input('fechaInicio');
            $eventoFormativo ->fechaFinal= $request->input('fechaFinal');
            $eventoFormativo ->modalidad = $request->input('modalidadEvento');
            $eventoFormativo ->idTipo = $request->input('tipoEvento');
            $eventoFormativo ->idInstructor = $request->input('instructorID');
            $idIns = $request->input('instructorID');
            $instructor = Instructor::where('idInstructor', $idIns)->firstOrFail();
            $eventoFormativo ->idInstancia = $instructor->idUsuario;
            $eventoFormativo ->diseñoInstruccional = $request->input('diseñoInstruccional');
            $eventoFormativo ->utilidadOportunidad = $request-> input('utilidadOpurtunidad');
            $eventoFormativo ->requisitosParticipacion = $request->input('requisitosParticipacion');
            $eventoFormativo ->requisitosAcreditacion = $request->input('requisitosParticipacion');
            $eventoFormativo ->condicionesOperativas = $request->input('condicionesOperativas');
            $eventoFormativo ->cuota = $request->input('cuotaEvento');
            $eventoFormativo ->duracion = 0;

            $eventoFormativo ->save();

            return redirect()->route('gestioneventos.index');

    }else{
   //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
        return back()->withInput(request(['nombrePlan']));
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEF)
    {
        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $modulos = Modulo::where('idEF', $idEF)->get();
        $duracionEF = 0;
        foreach($modulos as $modulo){
            $duracionEF = $duracionEF + $modulo->duracionModulo;
        }

        return view('eventos.detallesEvento', compact('evento','duracionEF'));
    }

    public function destroy($idEF)
    {
        echo ($idEF);
        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $evento-> delete();
        return redirect()->route('gestioneventos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idEF
     * @return \Illuminate\Http\Response
     */
    public function edit($idEF)
    {

        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $usuarios = Usuario::all();
        $instructor = Instructor::all();
        $tipoEvento = tipoEvento::all();
        //checa si la categoria tiene un academico o no

        return view('eventos.modificarEvento',compact('evento','usuarios','instructor','tipoEvento'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEF)
    {
        if( $request->input('fechaInicio') > $request->input('fechaFinal')){
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withErrors(['email'=> 'La fechea de inicio es mayor a la fecha final!']);

        }


            $eventoFormativo = EventoFormativo::where('idEF', $idEF)->firstOrFail();
            $eventoFormativo ->nombreEF = $request->input('nombreEvento');
            $eventoFormativo ->descripcion = $request->input('descripcionEvento');
            $eventoFormativo ->fechaInicio= $request->input('fechaInicio');
            $eventoFormativo ->fechaFinal= $request->input('fechaInicio');
            $eventoFormativo ->modalidad = $request->input('modalidadEvento');
            $eventoFormativo ->idTipo = $request->input('tipoEvento');;
            $eventoFormativo ->idInstructor =  $request->input('instructorID');
            $idIns = $request->input('instructorID');
            $instructor= Instructor::where('idInstructor', $idIns)->firstOrFail();
            $eventoFormativo ->idInstancia = $instructor->idUsuario;
            $eventoFormativo ->diseñoInstruccional = $request->input('diseñoInstruccional');
            $eventoFormativo ->utilidadOportunidad = $request-> input('utilidadOpurtunidad');
            $eventoFormativo ->requisitosParticipacion = $request->input('requisitosParticipacion');
            $eventoFormativo ->requisitosAcreditacion = $request->input('requisitosParticipacion');
            $eventoFormativo ->condicionesOperativas = $request->input('condicionesOperativas');
            $eventoFormativo ->cuota = $request->input('cuotaEvento');
            $eventoFormativo ->duracion = $eventoFormativo ->duracion;

            $eventoFormativo ->save();
            return redirect()->route('gestioneventos.index');



    }


    public function agregarModulo(){

        return view('eventos.agregarModulos',compact('evento','usuarios','instructor','tipoEvento'));
    }



}
