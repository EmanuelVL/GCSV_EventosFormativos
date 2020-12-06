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
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                
                  <tr>
                    <th>Nombre: {{$evento->nombreEF}}</th>
                   

                  </tr>
                  <tr>
                    <th>Fecha inicio: {{$evento->fechaInicio}}</th>
                   

                  </tr>
                  <tr>
                    <th>Fecha de fin: {{$evento->fechaFinal}}</th>
                   

                  </tr>
                  <tr>
                    <th>Modalidad: {{$evento->modalidad}}</th>
                   

                  </tr>
                  <tr>
                    <th>Instructor: {{$evento->idInstructor}}</th>
                   

                  </tr>
                  <tr>
                    <th>Diseño instruccional: {{$evento->diseñoInstruccional}}</th>
                   

                  </tr>
                  <tr>
                    <th>Utilidad oportunidad: {{$evento->utilidadOportunidad}}</th>
                   

                  </tr>
                  <tr>
                    <th>Requisitos de participación: {{$evento->requisitosParticipacion}}</th>
                   

                  </tr>
                  </thead>
                 
                </table>

            </div>
            
            </div>
</div>


@stop
