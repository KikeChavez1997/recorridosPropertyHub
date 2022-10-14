<?php

namespace App\Http\Controllers;

use App\Models\IndexHome;
use App\Models\Propiedad;
use App\Models\AgendarCita;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use PDF;



class PropiedadController extends Controller
{
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        $id_user = session('clienteID');

        $user = IndexHome::findOrFail($id_user);

        return view('admin.addpropiedad', compact('user'));
    }

    
    public function store(Request $request)
    {
        ////////////////////////////////////////////////////
        //$datosUsuario = request()->all();

        //$client = new Client(); 
        //$url = $request['UrlEB'];
        //$page = $client->request('GET', $url);
        //if($clave = $page->filter('.text-secondary')->count() > 0) {
        //    $auxClave = $page->filter('.text-secondary')->text();
        //}else{
        //    $auxClave = "";
        //}
        
        //$request = request()->all();

        $datosPropiedad = request()->except(['_token']);

        $aux = session('fechaID');

        $event = DB::table('agendar_citas')
                ->where('id', $aux)
                ->get();

        $fechaInicio = $event[0]->fecha." ".$datosPropiedad['Horario'].":00";
        $fechaFin = $event[0]->fecha." ".$datosPropiedad['HorarioFin'].":00";

        //return $datosPropiedad;

        $idPropiedad = DB::table('propiedads')->insertGetId([
            'cliente_id' => $datosPropiedad['cliente_id'],
            'cliente_name' => $datosPropiedad['cliente_name'],
            'id_fecha' => $datosPropiedad['id_fecha'],
            'UrlEB' => $datosPropiedad['UrlEB'],
            'ClaveEB' => $datosPropiedad['ClaveEB'],
            'UbicacionUrl' => $datosPropiedad['ubicacionUrl'],
            'Inmobiliaria' => $datosPropiedad['Inmobiliaria'],
            'MontoPorcentaje' => $datosPropiedad['MontoPorcentaje'],
            'QuienAtiendeTel' => $datosPropiedad['QuienAtiendeTel'],
            'AsesorMuestra' => $datosPropiedad['AsesorMuestra'],
            'Telefono' => $datosPropiedad['Telefono'],
            'TelefonoAsesor' => $datosPropiedad['TelefonoAsesor'],
            'EstadoConfirmado' => " ",
            'EstadoReconfirmado' => " ",
            'Horario' => $datosPropiedad['Horario'],
            'HorarioFin' => $datosPropiedad['HorarioFin'],
            'MetrosTerreno' => $datosPropiedad['MetrosTerreno'],
            'PrecioMQ' => $datosPropiedad['PrecioMQ'],
            'DieccionCita' => $datosPropiedad['DieccionCita'],
            'Precio' => $datosPropiedad['Precio'],
            'MetrosContruccion' => $datosPropiedad['MetrosContruccion'],
            'Predial' => $datosPropiedad['Predial'],
            'Mantenimiento' => $datosPropiedad['Mantenimiento'],
            'Precio-mtc' => " ",
            'Observaciones' => $datosPropiedad['Observaciones'],
        ]);

        $result = DB::table('eventos')->insertGetId([
            'title' => $datosPropiedad['cliente_name'],
            'id_propiedad' => $idPropiedad,
            'UbicacionUrl' => $datosPropiedad['ubicacionUrl'],
            'Inmobiliaria' => $datosPropiedad['Inmobiliaria'],
            'MontoPorcentaje' => $datosPropiedad['MontoPorcentaje'],
            'Precio' => $datosPropiedad['Precio'],
            'MetrosContruccion' => $datosPropiedad['MetrosContruccion'],
            'MetrosTerreno' => $datosPropiedad['MetrosTerreno'],
            'Predial' => $datosPropiedad['Predial'], 
            'Mantenimiento' => $datosPropiedad['Mantenimiento'], 
            'Observaciones' => $datosPropiedad['Observaciones'],  
            'asesor' => $event[0]->asesorComercial,
            'start' => $fechaInicio, 
            'end' => $fechaFin, 
        ]);

        //Propiedad::create($datosPropiedad);
        
        //$id = request('id_user')

        $idFicha = session('fechaID');

        return redirect('admin/show/'.$idFicha);

    }

   
    public function show(Propiedad $propiedad)
    {
        $datos['propiedades']=Propiedad::all();


        return view('admin.client', $datos); 
    }

    
    public function edit($id)
    {
        
        $id_user = session('clienteID');

        $propiedad = Propiedad::findOrFail($id);
        $user = IndexHome::findOrFail($id_user);

        return view('admin.propiedad', compact('propiedad', 'user'));
    }

   
    public function update(Request $request, $id)
    {

        $datosPropiedad = request()->except(['_token','_method']);
        Propiedad::where('id', $id)->update($datosPropiedad);

        $idFicha = session('fechaID');

        return redirect('admin/show/'.$idFicha);
    }

    
    public function destroy($id)
    {

        $idUser = session('clienteID');

        Propiedad::destroy($id);

        return redirect('admin/show/'.$idUser); 
    }

    public function ficha($id){


        $id = session('client');

        $propiedades = DB::table('propiedads')
        ->where('id', $id) 
        ->get();


        $cliente = IndexHome::findOrFail($id);

        return view('admin.propiedad', compact('cliente', 'propiedades')); 
    }

    public function clientesActivos($id){

        $cliente = IndexHome::findOrFail($id);

        $citas = DB::table('agendar_citas')
        ->where('id_user', $id)
        ->get();

        if($citas->count() > 0){
            $id_cita = $citas[0]->id;
        }else{
            $id_cita = 0;
        }

        $propiedades = DB::table('propiedads')
        ->where('id_fecha', $id_cita)
        ->get();

        return view('admin.clientActive', compact('cliente','propiedades','citas'));
    }

    public function listaPropiedades($id, $id_user){

        $cliente = IndexHome::findOrFail($id_user);
        $citaActual = AgendarCita::findOrFail($id);

        $citas = DB::table('agendar_citas')
        ->where('id_user', $id_user)
        ->get(); 

        if($citas->count() > 0){

            $propiedades = DB::table('propiedads')
            ->where('id_fecha', $id)
            ->get();
    
            return view('admin.listPropiedad', compact('cliente','propiedades','citaActual'));

        }else{
            
            $id_cita = 0;

            $propiedades = DB::table('propiedads')
            ->where('id_fecha', $id_cita)
            ->get();
    
            return view('admin.listPropiedad', compact('cliente','propiedades','citaActual'));
        }

    }

    Public function detalles($id, $id_user, $id_cita){

        $user = IndexHome::findOrFail($id_user);
        $cita = AgendarCita::findOrFail($id_cita);
        $propiedad = Propiedad::findOrFail($id);

        return view('admin.propiedadClient', compact('user','propiedad','cita'));
        
    }

    public function ofertaPDF($id_user, $id_propiedad){

        //return view('admin.pdf');

        $pdf = PDF::loadView('admin.pdf');

        return $pdf->stream();
        

        /*
        $dompdf = new Dompdf();

        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
        */
    }

    public function updateCita(Request $request, $id)
    {

        $datosPropiedad = request()->except(['_token','_method']);
        Propiedad::where('id', $id)->update($datosPropiedad);

        $idFicha = session('fechaID');

        $fecha = DB::table('agendar_citas')
            ->where('id', $idFicha)
            ->get();

        $fechaInicio = $fecha[0]->fecha." ".$datosPropiedad['Horario'].":00";

        $update = DB::table('eventos')
                    ->where('id', $id)
                    ->update(['start' => $fechaInicio]);

        return redirect('admin/show/'.$idFicha);
    }

    public function updateCitaFin(Request $request, $id)
    {

        $datosPropiedad = request()->except(['_token','_method']);
        Propiedad::where('id', $id)->update($datosPropiedad);

        $idFicha = session('fechaID');

        $fecha = DB::table('agendar_citas')
            ->where('id', $idFicha)
            ->get();

        $fechaFin = $fecha[0]->fecha." ".$datosPropiedad['HorarioFin'].":00";

        $update = DB::table('eventos')
                    ->where('id', $id)
                    ->update(['end' => $fechaFin]);
            
        return redirect('admin/show/'.$idFicha);
    }

    public function updateConfirmacion(Request $request, $id)
    {

        $datosPropiedad = request()->except(['_token','_method']);
        Propiedad::where('id', $id)->update($datosPropiedad);

        $idFicha = session('fechaID');

        return redirect('admin/show/'.$idFicha);
    }

    public function updateReConfirmacion(Request $request, $id)
    {

        $datosPropiedad = request()->except(['_token','_method']);
        Propiedad::where('id', $id)->update($datosPropiedad);

        $idFicha = session('fechaID');

        return redirect('admin/show/'.$idFicha);
    }

}
