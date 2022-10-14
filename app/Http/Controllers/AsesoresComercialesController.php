<?php

namespace App\Http\Controllers;

use App\Models\AsesoresComerciales;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class AsesoresComercialesController extends Controller
{
    
    public function index()
    {
        //DB::table('index_homes')->where('Estado','Futuro')->get();

        $roles = DB::table('model_has_roles')
                ->where('role_id', 3)        
                ->get(); 

        $users=User::all();

         //$datos['users']=AsesoresComerciales::all();
 
         return view('admin.asesor.index', compact('users', 'roles'));
    }

    
    public function create()
    {
        //
    }

    public function comercial()
    {
        return view('admin.asesor.create');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(AsesoresComerciales $asesoresComerciales)
    {
        //
    }

    
    public function edit(AsesoresComerciales $asesoresComerciales)
    {
        //
    }

    
    public function update(Request $request, AsesoresComerciales $asesoresComerciales)
    {
        //
    }

    
    public function destroy(AsesoresComerciales $asesoresComerciales)
    {
        //
    }
}
