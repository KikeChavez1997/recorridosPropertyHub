@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Lista de usuarios</h1>
    <br><br>   
@stop

@section('css')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
 
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'users.store']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre completo') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario'])!!}
            @error('named')
                <small class="text-danger">
                    {{$message}}
                </small>                            
            @enderror
            <br>
            {!! Form::label('name','Correo electrónico') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo electrónico'])!!}
            @error('email')
                <small class="text-danger">
                    {{$message}}
                </small>                            
            @enderror
            <br>
            {!! Form::label('name','Clave de acceso') !!}
            {!! Form::text('password', null, ['class' => 'form-control'])!!}

            @error('password')
                <small class="text-danger">
                    {{$message}}
                </small>                            
            @enderror

        </div>
        {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
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