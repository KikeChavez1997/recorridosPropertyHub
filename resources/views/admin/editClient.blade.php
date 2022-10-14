@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Editar cliente: <strong>{{$user->Nombre}} {{$user->Apellidos}}</strong> </h1>
    <br><br>
  </div>

  <form method="post" action="{{ url('admin/update/user/'.$user->id) }}" >
    @csrf
    {{ method_field('PATCH') }}
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
        <label for="validationDefault03">Estado del cliente</label>
        <select class="form-control" id="exampleFormControlSelect1" name="estado" required>
          <option value="Activo" >Activo</option>
          <option value="Futuro">Futuro</option>
          <option value="Descartado">Descartado</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Télefono cliente</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$user->Telefono}}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Nombre completo de contacto 2</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{$user->Contacto}}" required>
      </div>
    </div>

    <button class="btn btn-primary" type="submit">Actualizar</button>
  
  </form>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar propiedad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form method="post" action="{{ url('admin/addproperties') }}" >
            @csrf
            <div class="form-row">
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Url de EasyBroker (Origial)</label>
                <input type="text" class="form-control" id="UrlEB" name="UrlEB" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Url de EasyBroker con datos de PropertyHub</label>
                <input type="text" class="form-control" id="UrlPH" name="UrlPH" required>
              </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Agregar propiedad</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
    
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop