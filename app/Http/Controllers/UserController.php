<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        

        if ($request){
            $users = User::where('name', 'LIKE', '%'.$query.'%')
            ->orderBy('id', 'asc')
            ->paginate(10);
            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
        // $users = User::all();
        // return view('usuarios.index', ['users' => $users]);
    }

    
    public function create()
    {
        return view('usuarios.create');
    }

    
    public function store(Request $request)
    {
        $usuarios = new User();
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->password = Hash::make($request->input('password'));
        

        $usuarios->save();
        //$users = User::all();
        return redirect('/usuarios');
        // return view('usuarios.index', ['users' => $users]);
    }

    
    public function show($id)
    {
        return view('usuarios.show', ['user'=>User::findOrFail($id)]);
    }

    
    public function edit($id)
    {
        return view('usuarios.edit', ['user'=>User::findOrFail($id)]);
    }

    
    public function update(UserFormRequest $request, $id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->name = $request->get('name');
        $usuarios->email = $request->get('email');
        if($request->get('password') != ''){
            $usuarios->password = Hash::make($request->get('password'));
        }
        
        

        $usuarios->update();
        return redirect('/usuarios');
    }

    
    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);
        $nivel = ($usuarios->nivel);

        $usuarios->delete();
        $mensaje = 'Se borró un usuario';
        return redirect('usuarios')->with('status', 'Se borró el usuario');

        // if($nivel != 'admin'){
        //     $usuarios->delete();
        //     $mensaje = 'Se borró un usuario';
        //     return redirect('usuarios')->with('status', 'Se borró el usuario');
        // }else{
        //     $mensaje = 'No se puede borrar un Administrador';
        //     return redirect('usuarios')->with('status', 'No se puede borrar un Administrador!');
        // }
    }
}
