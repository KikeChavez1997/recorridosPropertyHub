<?php
/*
namespace App\Http\Controllers;
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('prueba.pdf');
*/    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Document</title>

    <style type="text/css" media="screen">
    
    table.blueTable {
    border: 1px solid #1C6EA4;
    background-color: #EEEEEE;
    width: 100%;
    text-align: left;
    border-collapse: collapse;
    }
    table.blueTable td, table.blueTable th {
    border: 1px solid #AAAAAA;
    padding: 3px 2px;
    }
    table.blueTable tbody td {
    font-size: 16px;
    }
    table.blueTable tr:nth-child(even) {
    background: #D0E4F5;
    }
    table.blueTable tfoot td {
    font-size: 16px;
    }
    table.blueTable tfoot .links {
    text-align: right;
    }
    table.blueTable tfoot .links a{
    display: inline-block;
    background: #1C6EA4;
    color: #FFFFFF;
    padding: 2px 8px;
    border-radius: 5px;
    }    

    
    </style>
   
</head>
<body>

    <p style="font-size: 30px; font-family: Montserrat; "> 
        <img src="{{ public_path('img/proper.png' ) }}" align="right">Carta oferta de <br> compraventa 
    </p>
    <div>
        <p style="font-size: 16px; text-align: justify;"> Yo, {{ $user->Nombre }} {{ $user->Apellidos}} (en lo sucesivo el “COMPRADOR”), a través de PropertyHub, 
            le manifiesto mi interés de comprar la propiedad del siguiente inmueble (en lo sucesivo el “INMUEBLE”), 
            en los términos que se indican en la presente Carta Oferta de Compraventa.</p>
    </div>
    <div>
        <table class="blueTable">
            <tbody>
            <tr>
            <td>Dirección</td><td>{{ $propiedad->DieccionCita}}</td></tr>
            <tr>
            <td>Precio de lista</td><td>{{ $propiedad->Precio}}</td></tr>
            </tbody>
            </tr>
        </table>
        
    </div>
    <div>
        <p style="font-size: 16px;"><strong>PRECIO:</strong> Ofrezco pagar por el inmueble la cantidad de ${{ $oferta->PagoInmueble }}.00 ({{ $oferta->PagoEscrito }} 00/100 pesos MN) en lo sucesivo la “OFERTA”, 
            cantidad que pagaré de la siguiente forma:
            <br><br> Apartado: ${{ $oferta->Apartar }}.00 ({{ $oferta->ApartarEscrito }} 00/100 pesos MN) pagado a la fecha de la firma del contrato privado de Promesa de Compraventa.
            <br><br> Pago: ${{ $oferta->PagoPeriodico }}.00 ({{ $oferta->PagoPeriodicoEscrito }}00/100 pesos MN) pagado a la fecha de la firma de la escritura pública ante el notario público elegido.
        </p>
    </div>
    <div>
        <p style="font-size: 16px;"><strong>FORMA DE PAGO:</strong> {{ $oferta->FormaPago }} 
            @if ( $oferta->Otro )

             , Forma seleccionada: {{ $oferta->Otro }}
            @endif

            <br><br>

            <strong>PLAZO:</strong> Con la firma de aceptación de ambas partes de la presente oferta, las partes se comprometen a celebrar el contrato privado de promesa de compraventa dentro de los siguientes 5 días hábiles.
            <br><br>
            <strong>VIGENCIA:</strong> La presente oferta tendrá una vigencia de 5 días naturales a partir de su fecha.
        </p>
    </div>
    <div>
        <p style="text-align: center; font-size: 16px;">
            <?php 
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $diassemana = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

            //echo $diassemana[date('w')-2]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

            setlocale(LC_TIME, 'es_Mx.UTF-8');
            $fecha = strftime("%A, %d de %B de %Y");
            ?>
            Ciudad de México a <?php echo  $fecha; ?>
        </p>
    </div>
    <div>
        <p style="text-align: center; font-size: 16px;"> {{ $user->Nombre }} {{ $user->Apellidos}}<br>
            ______________________________________________________<br>
                        Nombre completo del comprador
        </p>
    </div>
    <div>
        <p style="font-size: 16px; text-align: center;">
            Yo, _____________________________________, en mi carácter de legítimo propietario del inmueble, acepto en sus términos la presente oferta de Compraventa.<br><br>

            <br>_______________________________________<br>
            Firma del propietario vendedor

        </p>
    </div>
    
</body>
</html>



