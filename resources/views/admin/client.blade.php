@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Comprador: <strong>{{$cliente->Nombre}} {{$cliente->Apellidos}}</strong> </h1>
    <br>
    <?php 
            setlocale(LC_TIME, "spanish");
            //$fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime($cita->fecha )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
    ?>

    <h4>Fecha de recorrido: <strong>{{$mesDesc}}</strong> </h4>
    <br>
    @can('crear.propiedad')
    <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{ url('admin/add/properties/') }}">Agregar propiedad</a>
   
    @endcan
    <a class="btn btn-primary" href="{{ url('admin/show/cita/'.$cliente->id) }}"> Regresar a recorridos </a>
    <br> <br>
  </div>

    
@stop

@section('css')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')

@can('crear.propiedad')
<table class="table table-striped" id="propiedad" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">URL</th>
        <th scope="col">Ubicacion</th>
        <th scope="col">Asesor que atiende</th>
        <th scope="col">Hora inicio</th> 
        <th scope="col">Hora fin</th> 
        <th scope="col">Confirmada</th>
        <th scope="col">Reconfirmada</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ( $propiedades as $propiedad )
      <tr>
        <td><a href="{{ $propiedad->UrlEB }}" target="_blank">Ver propiedad</a></td>
        <td><a href="{{ $propiedad->UbicacionUrl }}" target="_blank">Ver en Waze</a></td>
        <td>Inmob. {{ $propiedad->Inmobiliaria }} <br> {{ $propiedad->QuienAtiendeTel}} <br> {{ $propiedad->TelefonoAsesor}}</td>
        <td>
          <form method="post" action="{{ url('admin/update/cita/unique/'.$propiedad->id) }}" >
            @csrf
            {{ method_field('PATCH') }}
            <input type="time" class="form-control" name="Horario" value="{{$propiedad->Horario}}">
            <br>
            <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
          </form>
         
        </td>
        <td>
          <form method="post" action="{{ url('admin/update/cita/fin/'.$propiedad->id) }}" >
            @csrf
            {{ method_field('PATCH') }}
            <input type="time" class="form-control" name="HorarioFin" value="{{$propiedad->HorarioFin}}">
            <br>
            <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
          </form>
         
        </td>
        <td>
          <form method="post" action="{{ url('admin/update/confirmacion/unique/'.$propiedad->id) }}" >
            @csrf
            {{ method_field('PATCH') }}
            <select class="form-control" name="EstadoConfirmado">
              <option value=" {{ $propiedad->EstadoConfirmado }}"> {{ $propiedad->EstadoConfirmado }}</option>
              <option value="Confirmado">Confirmado</option>
              <option value="No confirmado">No Confirmado</option>
            </select>
            <br>
            <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
          </form>
        </td>
        <td>
          <form method="post" action="{{ url('admin/update/reconfirmacion/unique/'.$propiedad->id) }}" >
            @csrf
            {{ method_field('PATCH') }}
            <select class="form-control" name="EstadoReconfirmado">
              <option value=" {{ $propiedad->EstadoReconfirmado }}"> {{ $propiedad->EstadoReconfirmado }}</option>
              <option value="Confirmado">Confirmado</option>
              <option value="No confirmado">No Confirmado</option>
            </select>
            <br>
            <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
          </form>
          
        </td>

        <td>
          <a class="btn btn-success" href="{{ url('admin/show/propiedad/'.$propiedad->id)}}">  {{ session(['clienteID' => $cliente->id ]) }}Editar</a>
          <br> <br>
          <form method="post" action="{{ url('admin/delete/propiedad/'.$propiedad->id) }}" > 
            @csrf
            {{ method_field('DELETE') }}

            {{ session(['clienteID' => $cliente->id ]) }}

            <button class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
          </form>

        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
  @endcan


  @can('ver.propiedad.asesor')
<table class="table table-striped" id="propiedad">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Ubicacion</th>
        <th scope="col">Propiedad</th>
        <th scope="col">Hora de incio cita</th>
        <th scope="col">Inmobiliaria</th>
        <th scope="col">Asesor que atiende</th> 
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ( $propiedades as $propiedad )
      <tr>
        <td><a target="_blank" href="{{ $propiedad->UbicacionUrl }}">Ver en Waze</a></td>
        <td><a target="_blank" href="{{ $propiedad->UrlEB }}">Ver propiedad</a></td>
        <td>{{ $propiedad->Horario }}</td>
        <td>{{ $propiedad->Inmobiliaria }}</td> 
        <td>Inmob. {{ $propiedad->Inmobiliaria }} <br> {{ $propiedad->QuienAtiendeTel}} <br> {{ $propiedad->TelefonoAsesor}}</td>
        <td> <a class="btn btn-success" href="{{ url('admin/show/propiedad/'.$propiedad->id)}}">  {{ session(['clienteID' => $cliente->id ]) }} Ver propiedad</a></td>
      </tr>
      @endforeach 
    </tbody>
  </table>
  @endcan

@stop

@section('js')
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#propiedad').DataTable({
                responsive: true,
                autoWidth: false,

                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "next": "Siguiente",
                        "previous":"Anterior"
                    }
        }
            });
        } );   
    </script>
@stop