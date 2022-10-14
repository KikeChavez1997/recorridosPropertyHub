@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/locales-all.js"></script>
<script src="{{ asset('js/agenda.js')}}" ></script>

  <div>
    <h1>Clientes futuros</h1>
    <br>
    @can('crear.cliente')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar nuevo cliente
    </button>
    @endcan
    
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form method="post" action="{{ url('admin/create') }}" >
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Nombre contacto 2</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault05">Télefono cliente</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
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
            </div>
            
            
            <button class="btn btn-primary" type="submit">Agregar cliente</button>
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

@can('borrar.cliente')
<table class="table table-striped" id="clientes">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Contacto 2</th>
        <th scope="col">Telefono</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      ?>
      @foreach ( $clientes as $cliente )
      <tr>
        <th scope="row">{{ $i }}</th>
        <td>{{ $cliente->Nombre }} {{ $cliente->Apellidos }}</td>
        <td>{{ $cliente->Contacto}}</td>
        <td>{{ $cliente->Telefono}}</td>
  

        <td><a class="btn btn-primary" href="{{ url('admin/edit/user/'.$cliente->id)}}">Editar</a></td>

        <td>
          <form method="post" action="{{ url('admin/delete/'.$cliente->id) }}" >
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')"type="submit">Borrar</button>
          </form>
        </td>
      </tr>
      <?php
      $i++;
      ?>
      @endforeach
    </tbody>
  </table>

  <!--  
  <div class="container">
      <div id="agenda">
       
      </div>
    </div> -->

  @endcan


  @can('ver.propiedad.asesor')
    <table class="table table-striped" id="clientes">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contacto 2</th>
            <th scope="col">Telefono</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          ?>
          @foreach ( $clientes as $cliente )
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $cliente->Nombre }} {{ $cliente->Apellidos }}</td>
            <td>{{ $cliente->Contacto}}</td>
            <td>{{ $cliente->Telefono}}</td>
            <td> <a class="btn btn-success" href="{{ url('admin/show/cita/'.$cliente->id)}}">Ver recorridos</a></td>
          </tr>
          <?php
          $i++;
          ?>
          @endforeach
        </tbody>
      </table>
  @endcan


  @can('ver.index')
    <table class="table table-striped" id="clientes">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contacto 2</th>
            <th scope="col">Telefono</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          ?>
          @foreach ( $clientes as $cliente )
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $cliente->Nombre }} {{ $cliente->Apellidos }}</td>
            <td>{{ $cliente->Contacto}}</td>
            <td>{{ $cliente->Telefono}}</td>
            <td><a class="btn btn-primary" href="{{ url('admin/edit/user/'.$cliente->id)}}">Editar</a></td>
          </tr>
          <?php
          $i++;
          ?>
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
            $('#clientes').DataTable({
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