<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $usuarios = DB::table('users')->join('empleado', 'users.id_empleado', '=', 'empleado.id_empleado')
                                               ->select('users.*','empleado.*')
                                               ->where('status', '=', 1)
                                               ->where(function ($query) use ($texto) {
                                                $query->where('username','LIKE','%'.$texto.'%')
                                                      ->orwhere('nombre','LIKE','%'.$texto.'%');
                                                })
                                            ->paginate(10);
        return view('usuarios.lista_usuarios', compact('usuarios','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('usuarios.registrar_usu', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'id_empleado' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $usuarios = User::create(request(['username', 'password', 'id_empleado']));
        return redirect()->to('/lista_usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $usuario = User::findOrFail($id);
        return view('usuarios/actualizar_usu', compact('usuario', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        $data = $request->only('username','id_empleado','password');

        $usuario->update($data);
        return redirect()->to('/lista_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        $usuario->status = 0;
        $usuario->save();
        return redirect()->to('/lista_usuarios');
    }
    
    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $usuarios = DB::table('users')->join('empleado', 'users.id_empleado', '=', 'empleado.id_empleado')
                                               ->select('users.*','empleado.*')
                                               ->where('status', '=', 0)
                                               ->where(function ($query) use ($texto) {
                                                    $query->where('username','LIKE','%'.$texto.'%')
                                                          ->orwhere('nombre','LIKE','%'.$texto.'%');
                                                })
                                                ->paginate(10);
        return view('usuarios.papelera_usu', compact('usuarios','texto'));
    }
    
    public function recover($id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        $usuario->status = 1;
        $usuario->save();
        return redirect()->to('/papelera_usuario');
    }
}
