@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Detalles de la propiedad </h1>
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
    
  <form method="post" action="{{ url('admin/update/propiedad/'.$propiedad->id) }}" >
    @csrf
    {{ method_field('PATCH') }}
    
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Url EasyBroker</label>
        <input type="text" class="form-control" id="UrlEB" name="UrlEB" value="{{$propiedad->UrlEB}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Url PropertyHub</label>
        <input type="text" class="form-control" id="UrlPH" name="UrlPH" value="{{$propiedad->UrlPH}}" required>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Clave de Easybroker</label>
        <input type="text" class="form-control" id="ClaveEB" name="ClaveEB" value="{{$propiedad->ClaveEB}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Inmobiliaria</label>
        <input type="text" class="form-control" id="Inmobiliaria" name="Inmobiliaria" value="{{$propiedad->Inmobiliaria}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Telefono de la inmobiliaria</label>
        <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{$propiedad->Telefono}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Quien atiende el telefono</label>
        <input type="text" class="form-control" id="QuienAtiendeTel" name="QuienAtiendeTel" value="{{$propiedad->QuienAtiendeTel}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Porcentaje que comparte</label>
        <input type="text" class="form-control" id="MontoPorcentaje" name="MontoPorcentaje" value="{{$propiedad->MontoPorcentaje}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Asesor que muestra</label>
        <input type="text" class="form-control" id="AsesorMuestra" name="AsesorMuestra" value="{{$propiedad->AsesorMuestra}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Telefono del asesor</label>
        <input type="text" class="form-control" id="TelefonoAsesor" name="TelefonoAsesor" value="{{$propiedad->TelefonoAsesor }}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Precio</label>
        <input type="text" class="form-control" id="Precio" name="Precio" value="{{$propiedad->Precio}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Metros de construccion</label>
        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" value="{{$propiedad->MetrosContruccion}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Precio por metro cuadrado</label>
        <input type="text" class="form-control" id="PrecioMQ" name="PrecioMQ" value="{{$propiedad->PrecioMQ}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Metros de terreno</label>
        <input type="text" class="form-control" id="MetrosTerreno" name="MetrosTerreno" value="{{$propiedad->MetrosTerreno}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Predial</label>
        <input type="text" class="form-control" id="Predial" name="Predial" value="{{$propiedad->Predial}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Mantenimiento</label>
        <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" value="{{$propiedad->Mantenimiento}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03"> Direccion</label>
        <input type="text" class="form-control" id="DieccionCita" name="DieccionCita" value="{{$propiedad->DieccionCita}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="validationDefault03">Observaciones</label>
        <textarea class="form-control" id="Observaciones" name="Observaciones" rows="4">{{ $propiedad->Observaciones }}</textarea>
      </div>
    </div> 

    <button class="btn btn-primary" type="submit">Actualizar propiedad</button>

  </form>
  @endcan


  @can('ver.propiedad.asesor')
    
  <form method="post" action="{{ url('admin/update/propiedad/'.$propiedad->id) }}" >
    @csrf
    {{ method_field('PATCH') }}
    <fieldset disabled>

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Inmobiliaria</label>
        <input type="text" class="form-control" id="Inmobiliaria" name="Inmobiliaria" value="{{$propiedad->Inmobiliaria}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Telefono de la inmobiliaria</label>
        <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{$propiedad->Telefono}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Quien atiende el telefono</label>
        <input type="text" class="form-control" id="QuienAtiendeTel" name="QuienAtiendeTel" value="{{$propiedad->QuienAtiendeTel}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Horario de inicio de cita</label>
        <input type="text" class="form-control" id="HorarioCita" name="HorarioCita" value="{{$propiedad->Horario}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Asesor que muestra</label>
        <input type="text" class="form-control" id="AsesorMuestra" name="AsesorMuestra" value="{{$propiedad->AsesorMuestra}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Telefono del asesor</label>
        <input type="text" class="form-control" id="TelefonoAsesor" name="TelefonoAsesor" value="{{$propiedad->TelefonoAsesor }}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Precio</label>
        <input type="text" class="form-control" id="Precio" name="Precio" value="{{$propiedad->Precio}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Metros de construccion</label>
        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" value="{{$propiedad->MetrosContruccion}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Precio por metro cuadrado</label>
        <input type="text" class="form-control" id="PrecioMQ" name="PrecioMQ" value="{{$propiedad->PrecioMQ}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03"> Metros de terreno</label>
        <input type="text" class="form-control" id="MetrosTerreno" name="MetrosTerreno" value="{{$propiedad->MetrosTerreno}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Predial</label>
        <input type="text" class="form-control" id="Predial" name="Predial" value="{{$propiedad->Predial}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Mantenimiento</label>
        <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" value="{{$propiedad->Mantenimiento}}">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03"> Direccion</label>
        <input type="text" class="form-control" id="DieccionCita" name="DieccionCita" value="{{$propiedad->DieccionCita}}">
      </div>
    </div>
    
    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="validationDefault03">Observaciones</label>
        <textarea class="form-control" id="Observaciones" name="Observaciones" rows="4">{{ $propiedad->Observaciones }}</textarea>
      </div>
    </div> 
  </fieldset> 
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