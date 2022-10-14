<?php

namespace App\Http\Controllers;

use App\Models\AgendarCita;
use App\Models\IndexHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AgendarCitaController extends Controller
{
    
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

    public function store(Request $request)
    {
        $request = request()->all();

        //$date = "2022-09-10";
        //$fecha = $date." ".$request['fecha'].":00";

        $result = DB::table('agendar_citas')->insertGetId([
                'id_user' => $request['id_user'],
                'asesorComercial' => $request['asesorComercial'],
                'fecha' => $request['fecha'], 
            ]);

        
        return redirect('admin/show/cita/'.$request['id_user'] );
    }


    public function show(AgendarCita $agendarCita, $id)
    {
        $cliente = IndexHome::findOrFail($id);
        
        //$datos['citas']=AgendarCita::all();

        $citas = DB::table('agendar_citas')
        ->where('id_user', $id)
        ->get();

        $roles = DB::table('model_has_roles')
                ->where('role_id', 3)        
                ->get(); 

        $users=User::all();

        return view('admin.cita', compact('cliente', 'citas', 'roles', 'users'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgendarCita  $agendarCita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = AgendarCita::findOrFail($id);

        $roles = DB::table('model_has_roles')
                ->where('role_id', 3)        
                ->get(); 

        $users=User::all();

        return view('admin.editCita', compact('cita', 'roles', 'users'));
    }

    public function update(Request $request, $id)
    {
        $datosCita = request()->except(['_token','_method']);

        AgendarCita::where('id', $id)->update($datosCita);

        $iduser =  session('clienteID');

        return redirect('admin/show/cita/'.$iduser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgendarCita  $agendarCita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idUser = session('clienteID');

        AgendarCita::destroy($id);

        return redirect('admin/show/cita/'.$idUser);
    }

    public function asesorCalendar($id, $name){

        $user = User::findOrFail($id);

        //$name = "Oscar Chavez Rosas";

        session(['nameCalendar' => $name]);
        
        return view('admin.asesor.calendar', compact('user'));
    }
}
