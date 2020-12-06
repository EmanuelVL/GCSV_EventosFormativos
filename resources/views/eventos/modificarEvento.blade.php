<!DOCTYPE html>
@extends('layout.layout')
@section('content')
     <!-- Page Content -->
  <title> Editar {{$evento->nombreEF}} </title>
  <div class="container background-style">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <h1 class="font-weight-light">Editar el evento: {{$evento->nombreEF}}</h1>
        <form method="POST" action="{{ route('gestioneventos.update',$evento->idEF)}}">
                @csrf
                @method("put")
                <br>
                <div class="form-group" {{ $errors->has('nombreEvento') ? 'has-error' : ''}}>
                  <label for="exampleInputEmail1"><strong>Nombre</strong></label>
                  <input type="text" class="form-control"  name='nombreEvento' value="{{$evento->nombreEF}}" placeholder="Escriba el nombre para el evento formativo">
                  {!! $errors->first('nombreEvento','<span class="help-block" style="color:red;">:message</span>')!!}
                </div>
                <br>

                <div class="form-group" {{ $errors->has('fechaInicio') ? 'has-error' : ''}}>
                  <label for="exampleInputPassword1" ><strong>Fecha de inicio</strong></label>
                  <input type ="date" class="form-control" name='fechaInicio' value="{{$evento->fechaInicio}}">
                  {!! $errors->first('fechaInicio','<span class="help-block" style="color:red;">:message</span>')!!}
                </div>

                
                     

                       
                <br>
                <button type="submit" style=" border-color: black; color:white; position:relative;top:10px"
                   class="btn btn-info ">
                   <span class="fa fa-edit"></span>
                  Editar evento
                </button>
              </form>
        <div style="height: 200px"></div>

      </div>
    </div>
@endsection