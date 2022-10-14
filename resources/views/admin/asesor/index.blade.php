@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Asesores comerciales</h1>
    <br>
    <!-- Button trigger modal -->
@stop

@section('css')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="usuarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electronico</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @foreach ($roles as $role )
                        @if ($role->model_id == $user->id)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a class="btn btn-info"href="{{ route('asesorCalendar', ['id' => $user->id, 'name' => $user->name]) }}">Ver calendario</a></td>
                            <td>
                                <a class="btn btn-primary"href="{{ route('userData', $user->id) }}">Editar</a>
                            </td>
                            <td >
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Quieres borrar?')"class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>  
                        </tr>     
                        @endif
                    @endforeach             
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
    
@stop

@section('js')
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable({
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