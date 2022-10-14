<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ofertas;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();

        $roles = DB::table('model_has_roles')->get();

        //return $roles;

        return view('admin.users.index', compact('users', 'roles'));
    }
 
   
    public function create()
    {
        return view('admin.users.create');
    }

    
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'unique:App\Models\User,email',
                'password' => 'required'
            ]
        );


        $pass = $request['password'];
        $Repass = bcrypt($pass);

        $result = DB::table('users')->insertGetId([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => $Repass,
        ]);

        $rol = DB::table('model_has_roles')->insertGetId([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => $result
        ]);


        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        
    }

    public function editData($id){

        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('admin.users.userEdit', compact('user'));

    }

    public function updateData(Request $request, $id){ 

        $user = DB::table('users')
                ->Where('id', $id)
                ->update([ 'name' => $request['name'], 'email' => $request['email']]);

        return redirect()->route('users.index');

    }
    
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit', $user)->with('info', 'Se asignaron los permisos correspondientes');
    }

    
    public function destroy(User $user)
    {
        $user->delete();

        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    public function showOfertas(){
        
        $ofertas = Ofertas::all();

        return view('admin.users.oferta', compact('ofertas'));
    }
}
