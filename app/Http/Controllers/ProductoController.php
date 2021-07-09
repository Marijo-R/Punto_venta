<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\TipoMedida;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $productos = DB::table('producto')->join('users', 'users.id', '=', 'producto.id_usuario')
                                               ->join('tipo_medida', 'tipo_medida.id_medida', '=', 'producto.id_medida')
                                               ->select('producto.*','users.*','tipo_medida.*')
                                               ->where('producto.estatus', '=', 1)
                                               ->where(function ($query) use ($texto) {
                                                $query->where('codigo','LIKE','%'.$texto.'%')
                                                      ->orwhere('codigo_alterno','LIKE','%'.$texto.'%')
                                                      ->orwhere('nombre','LIKE','%'.$texto.'%')
                                                      ->orwhere('marca','LIKE','%'.$texto.'%');
                                                })
                                            ->paginate(10);
        return view('productos.lista_productos', compact('productos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $medidas = TipoMedida::all();
        return view('productos.registrar_prod', compact('usuarios', 'medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->id_usuario = $request->input('id_usuario');
        $producto->codigo = $request->input('codigo');
        $producto->codigo_alterno = $request->input('codigo_alterno');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->marca = $request->input('marca');
        $producto->utilidad_porcentaje = $request->input('utilidad_porcentaje');
        $producto->stock = $request->input('stock');
        $producto->stock_max = $request->input('stock_max');
        $producto->stock_min = $request->input('stock_min');
        $producto->id_medida = $request->input('id_medida');
        $producto->precio_mayoreo = $request->input('precio_mayoreo');
        $producto->precio_menudeo = $request->input('precio_menudeo');
        $producto->comision_porcentaje = $request->input('comision_porcentaje');
        $producto->codigo_sat = $request->input('codigo_sat');
        $producto->unidad_sat = $request->input('unidad_sat');
        $producto->estatus = 1;
        $producto->save();
        return redirect()->to('/lista_productos');
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
    public function edit($id_producto)
    {
        $usuarios = User::all();
        $medidas = TipoMedida::all();
        $producto = Producto::findOrFail($id_producto);
        return view('productos.actualizar_prod', compact('producto', 'usuarios', 'medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $producto->id_usuario = $request->input('id_usuario');
        $producto->codigo = $request->input('codigo');
        $producto->codigo_alterno = $request->input('codigo_alterno');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->marca = $request->input('marca');
        $producto->utilidad_porcentaje = $request->input('utilidad_porcentaje');
        $producto->stock = $request->input('stock');
        $producto->stock_max = $request->input('stock_max');
        $producto->stock_min = $request->input('stock_min');
        $producto->id_medida = $request->input('id_medida');
        $producto->precio_mayoreo = $request->input('precio_mayoreo');
        $producto->precio_menudeo = $request->input('precio_menudeo');
        $producto->comision_porcentaje = $request->input('comision_porcentaje');
        $producto->codigo_sat = $request->input('codigo_sat');
        $producto->unidad_sat = $request->input('unidad_sat');
        $producto->save();
        return redirect()->to('/lista_productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $producto->estatus = 0;
        $producto->save();
        return redirect()->to('/lista_productos');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $productos = DB::table('producto')->join('users', 'users.id', '=', 'producto.id_usuario')
                                               ->join('tipo_medida', 'tipo_medida.id_medida', '=', 'producto.id_medida')
                                               ->select('producto.*','users.*','tipo_medida.*')
                                               ->where('producto.estatus', '=', 0)
                                               ->where(function ($query) use ($texto) {
                                                $query->where('codigo','LIKE','%'.$texto.'%')
                                                      ->orwhere('codigo_alterno','LIKE','%'.$texto.'%')
                                                      ->orwhere('nombre','LIKE','%'.$texto.'%')
                                                      ->orwhere('marca','LIKE','%'.$texto.'%');
                                                })
                                            ->paginate(10);
        return view('productos.papelera_prod', compact('productos','texto'));
    }
    
    public function recover($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $producto->estatus = 1;
        $producto->save();
        return redirect()->to('/papelera_producto');
    }
}
