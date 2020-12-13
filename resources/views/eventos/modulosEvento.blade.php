<!DOCTYPE html>
@extends('layout.layout')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .center-column {
        display: block;
        margin: auto;
    }
</style>
<title>Administrar modulos</title>
     <!-- Page Content -->

 <a type="button" style="color:black ;" class="btn btn-info btn-sm" href="{{route('gestioneventos.show',$evento->idEF)}}">
                                    Regresar
 </a>

<div class="card" align="center">
              <div class="card-header border-0">
                <h3 class="card-title">Lista de modulos:</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nombre del modulo</th>
                    <th>Contenido</th>
                    <th>Duracion</th>
                    <th>Acciones</th>

                  </tr>
                  </thead>
                  <tbody>

        @foreach ($modulos as $modulo)

                <tr>

                    <td>

                                <a style="color:blue !important;" href="{{route('gestioneventos.show',$evento->idEF)}}">{{$modulo->nombreModulo}}</a>


                    </td>
                <td style="height:10px;"><p class="descripcion-texto">{{$modulo->contenidoModulo}}</p></td>
                <td>

                                <a style="color:blue !important;" >{{$modulo->duracionModulo}} horas</a>
                                 </a>

                </td>
                    <td style="width:150px">
                        <div class="d-flex">



                            <div class="col-lg-6 col-md-6 flex-fill">
                                <form style="margin: 0px;" action="{{route('modulos.destroy',$modulo->idModulo)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar el modulo: {{ $modulo->nombreModulo }}?')" >
                                            <span class="fa fa-trash"></span>
                                        Eliminar
                                    </button>
                                    </center>
                                </form>
                            </div>

                            <div class="col-lg-6 col-md-6 flex-fill">
                                <center>
                                <a type="button" style="color:white !important;" class="btn btn-info btn-sm" href="/modulos/{{$modulo->idModulo}}/edit">
                                        <span class="fa fa-edit"></span>
                                    Editar
                                </a>
                                </center>
                            </div>

                        </div>
                    </td>
                </tr>




        @endforeach


                  </tbody>
                </table>

            </div>
            <br>
            <div class="box-footer">
            <form action="{{route('gestioneventos.agregarModulo')}}">
                                            <input type='hidden' value='{{$idEF}}' name='rec_id'/><br>
                                            <input type='submit' class="btn btn-info btn-sm" value='Agregar modulo'/>
                                        </form>

            </div>
            <br>
            </div>
</div>


@stop
