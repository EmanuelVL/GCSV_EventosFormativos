@extends('layout.layout')
@section('content')
<title>Lista de usuarios</title>

    <div class="card" align="center">
              <div class="card-header border-0">
                <h3 class="card-title">Lista de usuarios</h3>
                <div class="card-tools">

                </div>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Administrador</th>
                    <th>Instancia</th>
                    <th>Instructor</th>
                    <th>Acciones</th>

                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->nombreUsuario.' '.$usuario->apellidoUsuario}}</td>
                    <td>{{$usuario->correo}}</td>
                    <td>{{$usuario->esAdmin}}</td>
                    <td>{{$usuario->esInstancia}}</td>
                    <td>{{$usuario->esInstructor}}</td>
                    <td style="width:150px">
                        <div class="d-flex">
                            <div class="col-lg-6 col-md-6 flex-fill">
                                <form style="margin: 0px;" action="{{ route('gestionusuarios.destroy',$usuario->idUsuario) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar al usuario {{ $usuario->nombreUsuario }}?')" >
                                            <span class="fa fa-trash"></span>
                                        Eliminar
                                    </button>
                                    </center>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6 flex-fill">
                                <center>
                                <a type="button" style="color:white !important;" class="btn btn-info btn-sm" href="{{ route('gestionusuarios.edit', $usuario->idUsuario) }}">
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


            </div>

    <div class="box-footer">
                <form action="/gestionusuarios/create">
                    <input style="float:right; background-color:grey; color:white" class="btn pretty-btn"  type="submit" value="Agregar Usuario" />
                </form>
            </div>

</div>
@endsection