@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/locales-all.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>

<script src="{{ asset('js/agenda.js')}}" ></script> 

  <div>
    <h1>Asesor comercial: {{$user->name}}</h1>
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
        <div class="container">
            <div id="agenda">
             
            </div>
          </div>
    </div>
</div> 

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del recorrido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">

                <form action="" id="form1" >
                    
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Nombre del cliente cliente: </label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Ubicacion: </label>
                        
                        <input type="text" class="form-control" id="UbicacionUrl" name="UbicacionUrl" aria-describedby="UbicacionUrl">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Inmobiliaria: </label>
                        <input type="text" class="form-control" id="Inmobiliaria" name="Inmobiliaria" aria-describedby="Inmobiliaria">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Porcentaje que comparte: </label>
                        <input type="text" class="form-control" id="MontoPorcentajel" name="MontoPorcentaje" aria-describedby="MontoPorcentaje">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Precio del inmueble: </label>
                        <input type="text" class="form-control" id="Precio" name="Precio" aria-describedby="Precio">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Metros de contruccion: </label>
                        <input type="text" class="form-control" id="MetrosContruccion" name="MetrosContruccion" aria-describedby="MetrosContruccion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Metros de terreno: </label>
                        <input type="text" class="form-control" id="MetrosTerreno" name="MetrosTerreno" aria-describedby="MetrosTerreno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Predial: </label>
                        <input type="text" class="form-control" id="Predial" name="Predial" aria-describedby="Predial">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Mantenimiento: </label>
                        <input type="text" class="form-control" id="Mantenimiento" name="Mantenimiento" aria-describedby="Mantenimiento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="title">Observaciones: </label>
                        <textarea class="form-control" name="Observaciones" id="Observaciones" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
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