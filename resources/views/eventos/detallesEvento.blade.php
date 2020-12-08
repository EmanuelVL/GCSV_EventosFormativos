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
                <h3 class="card-title">  <i class="fas fa-globe"></i> Evento: {{$evento->nombreEF}} </h3>
                
                <center>
                                
                                <a type="button" style="color:white ;" class="btn btn-info btn-sm" href="{{route('modulos.show',$evento->idEF)}}">

                                    Ver modulos
                                </a>
                           
                            </center>
                <div class="card-tools">
                 
                            
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">{{$evento->nombreEF}} </h5>
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
                   

                  </tr>>

                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Modalidad: {{$evento->modalidad}} </h5>
                        </div>
                    </th>
                   

                  </tr>
                  <tr>
                    <th>
                    <div class="card-header">
                            <h5 class="m-0">Instructor: {{$evento->idInstructor}} </h5>
                        </div>
                    </th>
                   

                  </tr>
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
                            <h5 class="m-0">Duración: {{$evento->duracion}} horas</h5>
                        </div>
                        </th>
                  </tr>
                  </thead>
                 
                </table>

            </div>
          
            
            </div>
</div>


@stop
