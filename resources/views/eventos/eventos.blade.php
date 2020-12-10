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
<title>Administrar eventos</title>
     <!-- Page Content -->


<div class="card" align="center">
              <div class="card-header border-0">
                <h3 class="card-title">Lista de eventos:</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Acciones</th>

                  </tr>
                  </thead>
                  <tbody>

        @foreach ($EventoFormativo as $evento)

                <tr>

                    <td>
                       
                                <a style="color:blue !important;" href="{{route('gestioneventos.show',$evento->idEF)}}">{{$evento->nombreEF}}</a>
                                 </a>
                               
                    </td>
                <td style="height:10px;"><p class="descripcion-texto">{{$evento->descripcion}}</p></td>
                <td>
                       
                                <a style="color:blue !important;" >{{$evento->fechaInicio}}</a>
                                 </a>
                               
                </td>
                    <td style="width:150px">
                        <div class="d-flex">

                            <div class="col-lg-8 col-md-8 flex-fill">
                                <center>
                                
                                    <a type="button" style="color:white ;" class="btn btn-info btn-sm" href="{{route('gestioneventos.show',$evento->idEF)}}">

                                        Ver evento
                                    </a>
                               
                                </center>
                            </div>

                            <div class="col-lg-6 col-md-6 flex-fill">
                                <form style="margin: 0px;" action="{{route('gestioneventos.destroy',$evento->idEF)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar el evento: {{ $evento->nombreEF }}?')" >
                                            <span class="fa fa-trash"></span>
                                        Eliminar
                                    </button>
                                    </center>
                                </form>
                            </div>

                            <div class="col-lg-6 col-md-6 flex-fill">
                                <center>
                                <a type="button" style="color:white !important;" class="btn btn-info btn-sm" href="/gestioneventos/{{$evento->idEF}}/edit">
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
                <form action="/gestioneventos/create">
                    {{-- <button type="submit" style="float:right; background-color:grey" class="btn pretty-btn"  type="submit" value="">Crear evento</button> --}}
                    <input style="float:right; background-color:grey; color:white" class="btn pretty-btn"  type="submit" value="Crear evento" />
                </form>
            </div>
            <br>
            </div>
</div>


@stop
