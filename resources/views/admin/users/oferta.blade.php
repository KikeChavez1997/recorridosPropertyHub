<?php 

use App\Models\IndexHome;

?>

@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
  <div>
    <h1>Ofertas activas </h1>
    <br>
  </div>
@stop

@section('content')
<table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        
        <th scope="col">#</th>
        <th scope="col">Nombre de cliente</th>
        <th scope="col">Precio ofrecido</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

      <?php
      $i = 1;
      ?>
      
      @foreach ( $ofertas as $oferta )
      <tr>
        
        <td>{{ $i }}</td>

        <?php 
        $user = IndexHome::findOrFail($oferta->id_user);
        $aux = $user['Nombre'];
        $aux2 =$user['Apellidos'];

        ?>

        <td>{{ $aux}} {{$aux2}}</td> 
        <td>$ {{ $oferta->PagoInmueble }}</td>
        <td> <a class="btn btn-success" href="{{ url('admin/oferta/pdf', [ 'id_user' => $oferta->id_user, 'id_propiedad' => $oferta->id_propiedad, 'id' => $oferta->id])}}"> Descargar oferta</a></td>
      </tr>

      <?php
      $i++;
      ?>
      @endforeach 

    </tbody>
  </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop