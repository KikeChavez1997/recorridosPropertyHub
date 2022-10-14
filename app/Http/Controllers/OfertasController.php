<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\IndexHome;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use PDF;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_user, $id_propiedad)
    {
        $datosOferta = request()->except('_token');
        Ofertas::Insert($datosOferta);

        $user = IndexHome::findOrFail($id_user);
        $propiedad = Propiedad::findOrFail($id_propiedad);

        $pdf = PDF::loadView('admin.pdf', ['user'=>$user, 'propiedad'=>$propiedad, 'oferta'=>$datosOferta]);
        return $pdf->stream();

        //return redirect('admin/index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function show(Ofertas $ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ofertas $ofertas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ofertas $ofertas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ofertas $ofertas)
    {
        //
    }

    public function pdf($id_user, $id_propiedad,$id){

        
        $user = IndexHome::findOrFail($id_user);
        $propiedad = Propiedad::findOrFail($id_propiedad);
        $oferta = Ofertas::findOrFail($id);

        $pdf = PDF::loadView('admin.pdfAdmin', ['user'=>$user, 'propiedad'=>$propiedad, 'oferta'=>$oferta]);
        return $pdf->stream();

    }
}
