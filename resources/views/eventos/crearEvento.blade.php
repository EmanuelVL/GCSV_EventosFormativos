@extends('layout.layout')

@section('content')
   <!-- Page Content -->
   <title> Crear evento </title>
  <div class="container ">
              <div class="card-body p-5">
            <h1>Crear evento</h1>
          <form method="POST" action='{{route('gestioneventos.store')}}'>
              @csrf

              <div class="form-group" {{ $errors->has('nombreEvento') ? 'has-error' : ''}}>
                <label for="exampleInputEmail1">Nombre del evento formativo</label>
                <input type="text" class="form-control"  name='nombreEvento' placeholder="Nombre del área">
                {!! $errors->first('nombreEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('fechaInicio') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Fecha de inicio</label>
                <input type="date"  class='form-control'  name='fechaInicio'>
                {!! $errors->first('fechaInicio','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('fechaFinal') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Fecha final</label>
                <input type="date"  class='form-control'  name='fechaInicio'>
                {!! $errors->first('fechaFinal','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('modalidadEvento') ? 'has-error' : ''}}>
                <label for="exampleInputEmail1">Modalidad</label>
                <input type="text" class="form-control"  name='nombreEvento' placeholder="Modalidad">
                {!! $errors->first('modalidadEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

            

              {{-- @if($academicoSinCategoria->count() > 0) --}}
                  <div class="form-group" id="result_panel" {{ $errors->has('descripcionCategoria') ? 'has-error' : ''}}>
                      <div class="panel-heading"><h3 class="panel-title">Instructor</h3>
                      </div>
                      <div class="panel-body">
                          <select class="form-control" name="academicoID" id="card_type" required>
                              <option id="card_id" value="">Sin asignar</option>
                              @foreach ($usuarios as $academico)
                                  <option id="card_id"  value="{{$academico->id}}">{{$academico->nombre}}</option>
                              @endforeach
                          </select>
                          {!! $errors->first('academicoID','<span class="help-block" style="color:red;">:message</span>')!!}
                      </div>
                  </div>
                  {{-- @else
                      <p><i>No hay usuarios disponibles para asignar </i>.</p>
                      <input type='hidden' name='academicoID' value='NULL'>
                  @endif --}}

                  {{-- @if($academicoSinCategoria->count() > 0) --}}
                  <div class="form-group" id="result_panel" {{ $errors->has('descripcionCategoria') ? 'has-error' : ''}}>
                      <div class="panel-heading"><h3 class="panel-title">Tipo de evento</h3>
                      </div>
                      <div class="panel-body">
                          <select class="form-control" name="academicoID" id="card_type" required>
                              <option id="card_id" value="">Sin asignar</option>
                              @foreach ($usuarios as $academico)
                                  <option id="card_id"  value="{{$academico->id}}">{{$academico->nombre}}</option>
                              @endforeach
                          </select>
                          {!! $errors->first('academicoID','<span class="help-block" style="color:red;">:message</span>')!!}
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

              <div class="form-group " {{ $errors->has('condicionesOperativas') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Condiciones operativas</label>
                <textarea rows="4" class='form-control' cols="50" name='condicionesOperativas'></textarea>
                {!! $errors->first('condicionesOperativas','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('cuotaEvento') ? 'has-error' : ''}}>
                <label for="exampleInputPassword1">Cuota para inscribirse al evento</label>
                <input type="int" class='form-control'  name='condicionesOperativas'></textarea>
                {!! $errors->first('cuotaEvento','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>





              <button type="submit" class="btn pretty-btn" style="float: left; background-color:green; color:white">Crear área</button>
            </form>
        </div>
    </div>
@endsection