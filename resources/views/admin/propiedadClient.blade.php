@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Datos completos de la propiedad </h1>
    <br>
  </div>
  <p>Datos de cliente: <strong>{{$user->Nombre}} {{$user->Apellidos}}</strong> </p>
  
  <?php 
            setlocale(LC_TIME, "spanish");
            //$fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime($cita->fecha )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
    ?>

  <h4>Fecha de recorrido: <strong>{{$mesDesc}}</strong> </h4>
  <br>
  <div class="form-row">
    <div class="col-md-4 mb-3"> <br>
      <a class="btn btn-primary" target="_blank" href="{{ $propiedad->UrlPH }}">Ver fotos de la  propiedad</a>
    </div>
    <div class="col-md-4 mb-3">
      <br>
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
          Realizar una oferta por esta propiedad
        </button>
    </div>
</div>
<br>
  <form  >
    <fieldset disabled>
    <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault03">Horario de la cita</label>
          <input type="text" class="form-control" id="HorarioCita" name="HorarioCita" value="{{$propiedad->HorarioCita}}" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationDefault03"> Direccion</label>
          <input type="text" class="form-control" id="DieccionCita" name="DieccionCita" value="{{$propiedad->DieccionCita}}" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationDefault03">Precio</label>
          <input type="text" class="form-control" id="Precio" name="Precio" value="{{$propiedad->Precio}}" required>
        </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Metros de construccion</label>
        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" value="{{$propiedad->MetrosContruccion}}" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Metros de terreno</label>
        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" value="{{$propiedad->MetrosTerreno}}" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationDefault03">Predial</label>
        <input type="text" class="form-control" id="Predial" name="Predial" value="{{$propiedad->Predial}}" required>
      </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">Mantenimiento</label>
      <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" value="{{$propiedad->Mantenimiento}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">Precio por metro cuadrado</label>
      <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" value="{{$propiedad->PrecioMQ}}" required>
    </div>
   
    
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault03">Observaciones</label>
      <textarea class="form-control" id="Observaciones" name="Observaciones" rows="4" required >{{ $propiedad->Observaciones }}</textarea>
    </div>
  </div> 
</fieldset> 
</form>

<div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Realizar oferta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Llena el siguiente formulario para realizar una oferta por la propiedad</p>
            
            <form method="post" action="{{ url('ofertar', [ 'id_user' => $user->id, 'id_propiedad' => $propiedad->id]) }}">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Ofrezco pagar por el inmueble la cantidad $*</label>
                  <input type="number" class="form-control" name="PagoInmueble" required>
                  <input type="hidden" name="id_user" value="{{ $user->id }}">
                  <input type="hidden" name="id_propiedad" value="{{ $propiedad->id }}">
                  <input type="hidden" name="Estado" value="1">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Escribe la cantidad*</label>
                  <input type="text" class="form-control" name="PagoEscrito" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Apartare con la siguiente cantidad (minimo el 10%) $*</label>
                  <input type="number" class="form-control" name="Apartar" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Escribe la cantidad</label>
                  <input type="text" class="form-control" name="ApartarEscrito" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Pagare la siguiente cantidad periodicamente </label>
                  <input type="number" class="form-control" name="PagoPeriodico" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Escribe la cantidad</label>
                  <input type="text" class="form-control" name="PagoPeriodicoEscrito" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Forma de pago</label><br>
                  <select name="FormaPago">
                    <option value="Contado">Contado</option>
                    <option value="Crédito INFONAVIT">Crédito INFONAVIT</option>
                    <option value="Crédito BANCARIO">Crédito BANCARIO</option>
                    <option value="Crédito FOVISSSTE">Crédito FOVISSSTE</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="inputPassword4">Otro</label>
                <input type="text" class="form-control" name="Otro">
              </div>
              <button type="submit" class="btn btn-primary">Ofertar</button>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
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