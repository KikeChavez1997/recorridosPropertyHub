<?php

namespace App\Http\Controllers;

use App\Models\IndexHome;
use App\Models\AgendarCita;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class IndexHomeController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //$datosUsuario = request()->all();
        $datosUsuario = request()->except('_token');
        IndexHome::Insert($datosUsuario);
        //return response()->json($datosUsuario);

        
        return redirect('admin/index');

    }

   
    public function show(IndexHome $indexHome)
    {
       /* $client = new Client();
        $url = 'https://www.easybroker.com/mx/listing/rodrigoa_3/departamento-en-santa-fe-santa-fe-pena-blanca';
        $page = $client->request('GET', $url);

        $data = $page->filter('.property-title')->text();
        $price = $page->filter('.price')->text();
        
        return view('admin.index', compact('data', 'price'));
        */

        //session(['clienteID' => $id ]);



        //$datos['clientes']=IndexHome::all();

        $roles = DB::table('model_has_roles')
        ->where('role_id', 3)        
        ->get(); 

        $users=User::all();

        $clientes = DB::table('index_homes')->where('Estado','Activo')->get();

        
 
        return view('admin.index', compact('clientes','users','roles'));
        ////////////////////////////////////////
        //$propiedad['propiedades']=Propiedad::all();
        //return view('admin.index', $propiedad);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndexHome  $indexHome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = IndexHome::findOrFail($id);

        

        return view('admin.editClient', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndexHome  $indexHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuario = request()->except(['_token','_method']);
        IndexHome::where('id', $id)->update($datosUsuario);

        return redirect('admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndexHome  $indexHome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IndexHome::destroy($id);
        return redirect('admin/index');
    }

    public function ficha($id){

        $id_user = session('clienteID');
        session(['fechaID' => $id ]);

        $propiedades = DB::table('propiedads')
        ->select('*')
        ->where('id_fecha', $id)
        ->orderBy('Horario', 'desc')
        ->get();
        

        //$propiedades = Propiedad::orderBy('HorarioCita','DESC')->where('id_fecha', $id)->get();

        $roles = DB::table('model_has_roles')
                ->where('role_id', 3)        
                ->get(); 

        $users=User::all();

        $cita = AgendarCita::findOrFail($id);
        $cliente = IndexHome::findOrFail($id_user);

        return view('admin.client', compact('cliente', 'propiedades', 'cita', 'roles', 'users')); 
    }

    public function futuro(){
        
        $datos['clientes'] = DB::table('index_homes')->where('Estado','Futuro')->get();
 
        return view('admin.clientFuturo.index', $datos);
    }

    public function descartado(){
        
        $datos['clientes'] = DB::table('index_homes')->where('Estado','Descartado')->get();
 
        return view('admin.clientDescartado.index', $datos);
    }
}
