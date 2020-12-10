@extends('layout.layout')

@section('content')
   <!-- Page Content -->
   <title> Crear evento </title>
  <div class="container ">
              <div class="card-body p-5">
            <h1>Crear evento</h1>
            <form method="POST" action="{{route('gestioneventos.store')}}">
              @csrf

              <div class="form-group" {{ $errors->has('nombreEvento') ? 'has-error' : ''}}>
                <label for="exampleInputEmail1">Nombre del evento formativo</label>
                <input type="text" class="form-control" required  name='nombreEvento' placeholder="Nombre del evento">
                {!! $errors->first('nombreEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

            
              <div class="form-group " {{ $errors->has('descripcionEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Descripción del contenido del curso</label>
                <textarea rows="4" class='form-control' cols="50"  required name='descripcionEvento' placeholder = "Descripción del contenido del curso" ></textarea>
                {!! $errors->first('descripcionEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>


              <div class="form-group " {{ $errors->has('fechaInicio') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Fecha de inicio</label>
                <input type="date"  class='form-control' required name='fechaInicio'>
                {!! $errors->first('fechaInicio','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('fechaFinal') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Fecha final</label>
                <input type="date"  class='form-control' required  name='fechaFinal'>
                {!! $errors->first('fechaFinal','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('modalidadEvento') ? 'has-error' : ''}}>
                <label for="exampleInputEmail1">Modalidad</label>
                <input type="text" class="form-control" required name='modalidadEvento' placeholder="Modalidad">
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
                <textarea rows="4" class='form-control' cols="50" name='diseñoInstruccional'></textarea>
                {!! $errors->first('diseñoInstruccional','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('utilidadOpurtunidad') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Utilidad Opurtunidad</label>
                <textarea rows="4" class='form-control' cols="50" name='utilidadOpurtunidad'></textarea>
                {!! $errors->first('utilidadOpurtunidad','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('requisitosParticipacion') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Requisitos de participación</label>
                <textarea rows="4" class='form-control' cols="50" name='requisitosParticipacion'></textarea>
                {!! $errors->first('requisitosParticipacion','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('requisitosAcretiacion') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Requisitos de participación</label>
                <textarea rows="4" class='form-control' cols="50" name='requisitosAcreditacion'></textarea>
                {!! $errors->first('requisitosAcreditacion','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('condicionesOperativas') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Condiciones operativas</label>
                <textarea rows="4" class='form-control' cols="50" name='condicionesOperativas'></textarea>
                {!! $errors->first('condicionesOperativas','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('cuotaEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Cuota para inscribirse al evento</label>
                <input type="int" class='form-control'  required name='cuotaEvento'></textarea>
                {!! $errors->first('cuotaEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              

              <button type="submit" class="btn pretty-btn" style="float: left; background-color:green; color:white">Crear evento</button>
            </form>
        </div>
    </div>
@endsection