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
                  <input type="text" class="form-control" required name='nombreEvento' value="{{$evento->nombreEF}}" placeholder="Escriba el nombre para el evento formativo">
                  {!! $errors->first('nombreEvento','<span class="help-block" style="color:red;">:message</span>')!!}
                </div>
                <br>
                  
              <div class="form-group " {{ $errors->has('descripcionEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Descripción del contenido del curso</label>
                <textarea rows="4" class='form-control' cols="50" required name='descripcionEvento'  >{{$evento->descripcion}}</textarea>
                {!! $errors->first('descripcionEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>
                

                <div class="form-group" {{ $errors->has('fechaInicio') ? 'has-error' : ''}}>
                  <label for="exampleInputPassword1" ><strong>Fecha de inicio</strong></label>
                  <input type ="date" class="form-control" name='fechaInicio' required value="{{$evento->fechaInicio}}">
                  {!! $errors->first('fechaInicio','<span class="help-block" style="color:red;">:message</span>')!!}
                </div>
           

              <div class="form-group " {{ $errors->has('fechaFinal') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Fecha final</label>
                <input type="date"  class='form-control'  name='fechaFinal' required value="{{$evento->fechaInicio}}">
                {!! $errors->first('fechaFinal','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('modalidadEvento') ? 'has-error' : ''}}>
                <label for="exampleInputEmail1">Modalidad</label>
                <input type="text" class="form-control"  name='modalidadEvento' required value="{{$evento->modalidad}}">
                {!! $errors->first('modalidadEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

            

              {{-- @if($instructor->count() > 0) --}}
                  <div class="form-group" id="result_panel" {{ $errors->has('diseñoInstruccional') ? 'has-error' : ''}}>
                      <div class="panel-heading"><h3 class="panel-title">Instructor</h3>
                      </div>
                      <div class="panel-body">
                          <select class="form-control" name="instructorID" id="card_type" required>
                              <option id="card_id" value="">Sin asignar</option>
                              @foreach ($instructor as $instructores)
                                  <option id="card_id"  value="{{$instructores->idInstructor}}">{{$instructores->idInstructor}}</option>
                              @endforeach
                          </select>
                          {!! $errors->first('instructorID','<span class="help-block" style="color:red;">:message</span>')!!}
                      </div>
                  </div>
                  {{-- @else
                      <p><i>No hay usuarios disponibles para asignar </i>.</p>
                      <input type='hidden' name='instructorID' value='NULL'>
                  @endif --}}

                  {{-- @if($academicoSinCategoria->count() > 0) --}}
                  <div class="form-group" id="result_panel" {{ $errors->has('diseñoInstruccional') ? 'has-error' : ''}}>
                      <div class="panel-heading"><h3 class="panel-title">Tipo de evento</h3>
                      </div>
                      <div class="panel-body">
                          <select class="form-control" name="tipoEvento" id="card_type" required>
                              <option id="card_id" value="">Sin asignar</option>
                              @foreach ($tipoEvento as $tipo)
                                  <option id="card_id"  value="{{$tipo->idTipo}}">{{$tipo->nombreTipo}}</option>
                              @endforeach
                          </select>
                          {!! $errors->first('tipoEvento','<span class="help-block" style="color:red;">:message</span>')!!}
                      </div>
                  </div>
                  {{-- @else
                      <p><i>No hay usuarios disponibles para asignar </i>.</p>
                      <input type='hidden' name='academicoID' value='NULL'>
                  @endif --}}

                <div class="form-group " {{ $errors->has('diseñoInstruccional') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Diseño instruccional</label>
                <textarea rows="4" class='form-control' cols="50" name='diseñoInstruccional' value="{{$evento->diseñoInstruccional}}">{{$evento->diseñoInstruccional}}</textarea>
                {!! $errors->first('diseñoInstruccional','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('utilidadOportunidad') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Utilidad Opurtunidad</label>
                <textarea rows="4" class='form-control' cols="50" name='utilidadOportunidad' value="">{{$evento->utilidadOportunidad}}</textarea>
                {!! $errors->first('utilidadOportunidad','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('requisitosParticipacion') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Requisitos de participación</label>
                <textarea rows="4" class='form-control' cols="50" name='requisitosParticipacion'  value="">{{$evento->requisitosParticipacion}}</textarea>
                {!! $errors->first('requisitosParticipacion','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('requisitosAcretiacion') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Requisitos de participación</label>
                <textarea rows="4" class='form-control' cols="50" name='requisitosAcreditacion'  >{{$evento->requisitosAcreditacion}}</textarea>
                {!! $errors->first('requisitosAcreditacion','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('condicionesOperativas') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Condiciones operativas</label>
                <textarea rows="4" class='form-control' cols="50" name='condicionesOperativas' >{{$evento->condicionesOperativas}}</textarea>
                {!! $errors->first('condicionesOperativas','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('cuotaEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Cuota para inscribirse al evento</label>
                <input type="int" class='form-control'  name='cuotaEvento' required value="{{$evento->cuota}}"></textarea>
                {!! $errors->first('cuotaEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('cuotaEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Duracion del evento en horas</label>
                <input type="int" class='form-control'  name='duracionEvento' required  value="{{$evento->duracion}}"></textarea>
                {!! $errors->first('duracionEvento','<span class="help-block" style="color:red;">:message</span>')!!}
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