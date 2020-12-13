<?php
    if(!(auth()->user())){
        header('Location: http://sistemaeventosformativos.test/');
        die();
    }
?>

<!DOCTYPE html>
@extends('layout.layout')
@section('content')

<title> Inicio </title>
    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <div class="card-header border-0">
                <h3 class="card-title">Eventos formativos proximos</h3>
                <div class="card-tools">

                </div>
              </div>

                    <!-- Page Heading -->
                    @foreach ($evento->sortBy('fechaInicio') as $eventos)


                            <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                      <div class="card-header">
                        <h5 class="m-0">{{$eventos->nombreEF}} </h5>
                      </div>
                      <div class="card-header">
                        <h5 class="m-0">Descripcion: {{$eventos->descripcion}} </h5>
                      </div>
                      <div class="card-header">
                        <h5 class="m-0"> {{$eventos->fechaInicio}} </h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text"></p>
                        <a href="{{route('gestioneventos.show',$eventos->idEF)}}" class="btn btn-primary">Ver más</a>
                        <a href="{{route('inscripcion.show',$eventos->idEF)}}" class="btn btn-primary">Inscribirse</a>
                      </div>
                    </div>  


                    @endforeach





                                      <div class="card card-primary card-outline" style="text-align: center; opacity:1;">


                    </div>






                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
    </body>
</html>
@endsection
