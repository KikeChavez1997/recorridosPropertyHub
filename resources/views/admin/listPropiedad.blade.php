@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Comprador: <strong>{{$cliente->Nombre}} {{$cliente->Apellidos}}</strong> </h1>
    <br>

    <?php 
            setlocale(LC_TIME, "spanish");
            //$fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime($citaActual->fecha )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
    ?>

    <h4>Fecha de recorrido: <strong>{{ $mesDesc}}</strong> </h4>
    <br>
  </div>

  <form method="post" action="" >
    <fieldset disabled>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Télefono cliente</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$cliente->Telefono}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Nombre completo de contacto 2</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{$cliente->Contacto}}" required>
      </div>
    </div>
    </fieldset>
  </form>   
@stop

@section('css')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop


@section('content')
<table class="table table-striped" id="propiedad">
    <thead class="thead-dark">
      <tr>
        
        <th scope="col">Horario</th>
        <th scope="col">Dirección</th>
        <th scope="col">Precio</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    

      @foreach ( $propiedades as $propiedad )
      <tr>
        
        <td>{{ $propiedad->Horario }}</td>
        <td>{{ $propiedad->DieccionCita }}</td> 
        <td>{{ $propiedad->Precio }}</td>
        <td> <a class="btn btn-success" href="{{ url('client/list/detail', [ 'id' => $propiedad->id, 'id_user' => $cliente->id, 'id_cita' => $citaActual->id]) }}"> Ver detalles completos</a></td>
      </tr>
      @endforeach 

    </tbody>
  </table>

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