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

<a type="button" style="color:black ;" class="btn btn-info btn-sm" href="{{route('gestioneventos.index')}}">
     Regresar
</a>
<title>Administrar eventos</title>
     <!-- Page Content -->


<div class="card" align="center">
              <div class="card-header border-0">
                <h5 class="card-title">  <i class="fas fa-globe"></i> Evento: {{$evento->nombreEF}} </h5>





              <div class="card-body table-responsive p-0">




                <br>
                <div class="card-tools">

                  </div>
                <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Evento: {{$evento->nombreEF}} </h5>
                            <br>
                            <center>

                                <a type="button" style="color:black ;" class="btn btn-info btn-sm" href="{{route('modulos.show',$evento->idEF)}}">
                                    Ver modulos del evento
                                </a>

                          </center>
                        </div>

                    </th>

                  </tr>

                  <tr>
                    <th>
                    <div class="card-header">
                            <h5 class="m-0">Fecha de inicio: {{$evento->fechaInicio}} </h5>
                        </div>
                    </th>


                  </tr>

                  <tr>
                    <th>
                    <div class="card-header">
                            <h5 class="m-0">Fecha de fin: {{$evento->fechaFinal}} </h5>
                        </div>
                    </th>


                  </tr>

                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Modalidad: {{$evento->modalidad}} </h5>
                        </div>
                    </th>


                  </tr>
                  </div>

                  <tr>
                    <th>
                    <div class="card-header">
                            <h5 class="m-0">Instructor: {{$evento->idInstructor}} </h5>
                        </div>
                    </th>
                    <div class="card card-primary card-outline" style="text-align: center; opacity:1;">

                  </tr>
                  </div>
                  <tr>
                    <th>
                    <div class="card-header">
                            <h5 class="m-0">Diseño instruccional: {{$evento->diseñoInstruccional}} </h5>
                        </div>
                    </th>


                  </tr>
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Utilidad oportunidad: {{$evento->utilidadOportunidad}} </h5>
                        </div>
                    </th>


                  </tr>
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Requisitos de participación: {{$evento->requisitosParticipacion}}</h5>
                        </div>
                        </th>
                  </tr>

                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Requisitos de acreditación: {{$evento->requisitosAcreditacion}}</h5>
                        </div>
                        </th>
                  </tr>
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Condiciones operativas: {{$evento->condicionesOperativas}}</h5>
                        </div>
                        </th>
                  </tr>
                  <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Cuota: {{$evento->cuota}}$</h5>
                        </div>
                        </th>
                  </tr>
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Duración: {{$duracionEF}} horas</h5>
                          @if ($duracionEF < 120 and $evento->idTipo == 4 )
                            El evento requiere un minimo de 120 horas para un diplomado

                          @endif
                          @if ($duracionEF < 120 and $evento->idTipo == 3 )
                            El evento requiere un minimo de 20 horas para tener valor curricular como Programa especial

                          @endif
                          @if ($duracionEF < 20 and $evento->idTipo == 1 )
                            El evento requiere un minimo de 20 horas para tener valor curricular como Curso

                          @endif
                          @if ($duracionEF < 10 and $evento->idTipo == 2 )
                            El evento requiere un minimo de 10 horas para tener valor curricular como Taller

                          @endif
                        </div>
                        </th>
                  </tr>



            </div>
            <div class="card card-primary card-outline" style="text-align: center; opacity:1;">


                      </div>

            </div>
</div>


@stop
