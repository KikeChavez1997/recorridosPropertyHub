@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Agregar propiedad</h1>
    <br>
  </div>
  <p>Datos de cliente: <strong>{{$user->Nombre}} {{$user->Apellidos}}</strong> </p>
  <form method="post" >
    <fieldset disabled>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$user->Nombre}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$user->Apellidos}}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Nombre completo de contacto 2</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{$user->Contacto}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Télefono cliente</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$user->Telefono}}" required>
      </div>
    </div>
    </fieldset> 
  </form>
  <br>
  <div class="alert alert-primary" role="alert">
    Datos de la propiedad
  </div>

  @can('crear.propiedad')
    
  <form method="post" action="{{ url('admin/addproperties') }}" >
    @csrf
    
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Url propiedad</label>
        <input type="text" class="form-control" id="UrlEB" name="UrlEB" value="" required>
      </div>
    </div>

    <input type="hidden" name="id_fecha" value="{{session('fechaID')}}">

    <input type="hidden" name="cliente_id" value="{{ $user->id }}">

    <input type="hidden" name="cliente_name" value="{{ $user->Nombre}}">

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Clave de Easybroker (Opcional)</label>
        <input type="text" class="form-control" id="ClaveEB" name="ClaveEB" value="">
      </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault03">Ubicación URL Wize </label>
          <input type="text" class="form-control" id="UbicacionUrl" name="ubicacionUrl" value="">
        </div>
      </div>

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Inmobiliaria</label>
        <input type="text" class="form-control" id="Inmobiliaria" name="Inmobiliaria" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Telefono de la inmobiliaria</label>
        <input type="text" class="form-control" id="Telefono" name="Telefono" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Quien atiende el telefono</label>
        <input type="text" class="form-control" id="QuienAtiendeTel" name="QuienAtiendeTel" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Porcentaje que comparte</label>
        <input type="text" class="form-control" id="MontoPorcentaje" name="MontoPorcentaje" value="" required>
      </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault05">Inicio del recorrido</label>
          <input type="time" class="form-control" id="Horario" name="Horario" value="" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault05">Fin del recorrido</label>
          <input type="time" class="form-control" id="HorarioFin" name="HorarioFin" value="" required>
        </div>
      </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Asesor que muestra</label>
        <input type="text" class="form-control" id="AsesorMuestra" name="AsesorMuestra" value="" required="required">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Telefono del asesor</label>
        <input type="text" class="form-control" id="TelefonoAsesor" name="TelefonoAsesor" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Precio</label>
        <input type="text" class="form-control" id="Precio" name="Precio" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Metros de construccion</label>
        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Precio por metro cuadrado</label>
        <input type="text" class="form-control" id="PrecioMQ" name="PrecioMQ" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Metros de terreno</label>
        <input type="text" class="form-control" id="MetrosTerreno" name="MetrosTerreno" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Predial</label>
        <input type="text" class="form-control" id="Predial" name="Predial" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Mantenimiento</label>
        <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03"> Direccion</label>
        <input type="text" class="form-control" id="DieccionCita" name="DieccionCita" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="validationDefault03">Observaciones</label>
        <textarea class="form-control" id="Observaciones" name="Observaciones" rows="4"></textarea>
      </div>
    </div> 

    <button class="btn btn-primary" type="submit">Agregar propiedad</button>

  </form>
  @endcan
    
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop