@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Edita la fecha </h1>
    <br><br>
  </div>

  <form method="post" action="{{ url('admin/update/cita/'.$cita->id) }}" >
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Fecha: </label> 
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{$cita->fecha}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Asesor comercial</label>
        <select class="form-control" name="asesorComercial">
          @foreach ($users as $user)
              @foreach ($roles as $role )
                  @if ($role->model_id == $user->id)
                    <option>{{$user->name}}</option>   
                  @endif
              @endforeach             
          @endforeach
        </select>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Actualizar</button>
  
  </form>
    
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop