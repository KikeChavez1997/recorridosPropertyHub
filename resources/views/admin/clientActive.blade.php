@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Cliente: <strong>{{$cliente->Nombre}} {{$cliente->Apellidos}}</strong> </h1>
    <br> <br>
  </div>

  <form method="post" action="" > 
    <fieldset disabled>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Nombre completo de contacto 2</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{$cliente->Contacto}}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault05">Télefono cliente</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$cliente->Telefono}}" required>
      </div>
    </div>
    </fieldset>
  </form>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresa la fecha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form method="post" action="{{ url('admin/addfecha') }}" >
            @csrf
            <div class="form-row">
              <input type="hidden" name="id_user" value="{{ $cliente->id }}">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Agregar fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
              </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Agregar fecha</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
    
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
          <th scope="col">#</th>
          <th scope="col">Fecha de recorrido</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        ?>
        @foreach ( $citas as $cita )
        <tr>
          <td>{{ $i }}</td>
          <?php 
            setlocale(LC_TIME, "spanish");
            //$fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime($cita->fecha )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
          ?>
          <td>{{ $mesDesc }}</td> 
          <td> <a class="btn btn-info" href="{{ url('show/client/list/propiedad', [ 'id' => $cita->id, 'id_user' => $cliente->id]) }}"> Ver propiedades</a></td>
        </tr>
        <?php
          $i++;
          ?>
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