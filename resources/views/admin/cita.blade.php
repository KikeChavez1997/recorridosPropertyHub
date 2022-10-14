@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Cliente: <strong>{{$cliente->Nombre}} {{$cliente->Apellidos}}</strong> </h1>
    <br>
    @can('crear.cita')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar fecha
    </button>
    <a class="btn btn-primary" href="{{ url('admin/index') }}"> Regresar a la lista de clientes </a>
    @endcan

    <br> <br> 
  </div>

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

@can('crear.cita')
<table class="table table-striped" id="citas">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha de recorrido</th>
        <th scope="col">Asesor comercial</th>
        <th scope="col"></th>
        <th scope="col"></th>
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
        <td>{{ $cita->asesorComercial }}</td>
        <td> <a class="btn btn-primary" href="{{ url('admin/edit/fecha/'.$cita->id) }}"> {{ session(['clienteID' => $cliente->id ]) }} Editar fecha</a></td>
          
        <td> <a class="btn btn-info" href="{{ url('admin/show/'.$cita->id)}}">  {{ session(['clienteID' => $cliente->id ]) }} Listado de propiedades</a></td>

        <td>
          <form method="post" action="{{ url('admin/delete/cita/'.$cita->id) }}" >
            @csrf
            {{ method_field('DELETE') }}
            {{ session(['clienteID' => $cliente->id ]) }}

            <button class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')"type="submit">Borrar recorrido</button>
          </form>
        </td>
      </tr>
      <?php
      $i++;
      ?>
      @endforeach
    </tbody>
  </table>
  @endcan

  @can('ver.propiedad.asesor')
<table class="table table-striped" id="citas">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Fecha de recorrido</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ( $citas as $cita )

      <tr>
        <?php 
            setlocale(LC_TIME, "spanish");
            //$fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime($cita->fecha )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
        ?>
        <td>{{ $mesDesc }}</td>
        <td> <a class="btn btn-info" href="{{ url('admin/show/'.$cita->id)}}"> {{session(['clienteID' => $cliente->id])}} Ver propiedades</a> </td>
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
            $('#citas').DataTable({
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