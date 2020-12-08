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
                <h3 class="card-title">  <i class="fas fa-globe"></i> Modulos del Evento: {{$evento->nombreEF}} </h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
               
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Modulo: {{$modulos->nombreModulo}} </h5>
                        </div>
                    </th>
                    
                  </tr>
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Contenido del modulo: {{$modulos->contenidoMod}} </h5>
                        </div>
                    </th>
                    
                  </tr>
                  
                  <tr>
                    <th>
                        <div class="card-header">
                            <h5 class="m-0">Duración: {{$modulos->duracion}} horas</h5>
                        </div>
                        </th>
                  </tr>
                  </thead>
              
                </table>

            </div>
            
            
            </div>
</div>


@stop
