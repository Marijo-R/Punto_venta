<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\ProveedorFisico;
use App\Models\Fisico;
use App\Models\Telefono;
use App\Models\TelefonoProveedor;
use Illuminate\Support\Facades\DB;

class ProveedorFisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $proveedores = DB::table('proveedor')->join('proveedor_fisico', 'proveedor_fisico.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('fisico', 'fisico.id_fisico', '=', 'proveedor_fisico.id_fisico')
                                             ->join('telefono_proveedor', 'telefono_proveedor.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_proveedor.id_telefono')
                                             ->select('proveedor.*','fisico.*','proveedor_fisico.*','telefono_proveedor.*','telefono.*')
                                             ->where('proveedor.estatus', '=', 1)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('nombre','LIKE','%'.$texto.'%')
                                                   ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('segundo_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(10);
        return view('proveedoresFisico.lista_proveedores_fis', compact('proveedores','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedoresFisico.registrar_proveedor_fis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fisico = new Fisico;
        $fisico->nombre = $request->input('nombre');
        $fisico->primer_apellido = $request->input('primer_apellido');
        $fisico->segundo_apellido = $request->input('segundo_apellido');
        $fisico->curp = $request->input('curp');
        $fisico->estatus = 1;
        $fisico->save();

        $idFisico = DB::table('fisico')->max('id_fisico');

        $proveedor = new Proveedor;
        $proveedor->rfc = $request->input('rfc');
        $proveedor->email = $request->input('email');
        $proveedor->comentarios = $request->input('comentarios');
        $proveedor->calle = $request->input('calle');
        $proveedor->entre_calles = $request->input('entre_calles');
        $proveedor->no_exterior = $request->input('no_exterior');
        $proveedor->no_interior = $request->input('no_interior');
        $proveedor->cod_postal = $request->input('cod_postal');
        $proveedor->colonia = $request->input('colonia');
        $proveedor->localidad = $request->input('localidad');
        $proveedor->ciudad = $request->input('ciudad');
        $proveedor->entidad_fed = $request->input('entidad_fed');
        $proveedor->pais = $request->input('pais');
        $proveedor->estatus = 1;
        $proveedor->save();

        $idProveedor = DB::table('proveedor')->max('id_proveedor');

        $provFisico = new ProveedorFisico;
        $provFisico->id_fisico = $idFisico;
        $provFisico->id_proveedor = $idProveedor;
        $provFisico->estatus = 1;
        $provFisico->save();

        $telefono = new Telefono;
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->estatus = 1;
        $telefono->save();

        $idTelefono = DB::table('telefono')->max('id_telefono');

        $provTelefono = new TelefonoProveedor;
        $provTelefono->id_proveedor = $idProveedor;
        $provTelefono->id_telefono = $idTelefono;
        $provTelefono->save();

        return redirect()->to('/lista_proveedores_fis');
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
    public function edit($id_proveedor)
    {
        $id_fisico = ProveedorFisico::select('id_fisico')->where('id_proveedor', '=', $id_proveedor)->get();
        $fisico = Fisico::findOrFail($id_fisico)->first();
        $proveedor = Proveedor::findOrFail($id_proveedor);
        $id_telefono = TelefonoProveedor::select('id_telefono')->where('id_proveedor', '=', $id_proveedor)->get();
        $telefono = Telefono::findOrFail($id_telefono)->first();
        return view('proveedoresFisico.actualizar_proveedor_fis', compact( 'fisico','proveedor', 'telefono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proveedor)
    {
        $id_fisico = ProveedorFisico::select('id_fisico')->where('id_proveedor', '=', $id_proveedor)->get();
        $fisico = Fisico::findOrFail($id_fisico)->first();
        $fisico->nombre = $request->input('nombre');
        $fisico->primer_apellido = $request->input('primer_apellido');
        $fisico->segundo_apellido = $request->input('segundo_apellido');
        $fisico->curp = $request->input('curp');
        $fisico->save();

        $proveedor = Proveedor::findOrFail($id_proveedor);
        $proveedor->rfc = $request->input('rfc');
        $proveedor->email = $request->input('email');
        $proveedor->comentarios = $request->input('comentarios');
        $proveedor->calle = $request->input('calle');
        $proveedor->entre_calles = $request->input('entre_calles');
        $proveedor->no_exterior = $request->input('no_exterior');
        $proveedor->no_interior = $request->input('no_interior');
        $proveedor->cod_postal = $request->input('cod_postal');
        $proveedor->colonia = $request->input('colonia');
        $proveedor->localidad = $request->input('localidad');
        $proveedor->ciudad = $request->input('ciudad');
        $proveedor->entidad_fed = $request->input('entidad_fed');
        $proveedor->pais = $request->input('pais');
        $proveedor->save();

        $id_telefono = TelefonoProveedor::select('id_telefono')->where('id_proveedor', '=', $id_proveedor)->get();
        $telefono = Telefono::findOrFail($id_telefono)->first();
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->save();

        return redirect()->to('/lista_proveedores_fis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proveedor)
    {
        $proveedor = Proveedor::findOrFail($id_proveedor);
        $proveedor->estatus = 0;
        $proveedor->save();
        return redirect()->to('/lista_proveedores_fis');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $proveedores = DB::table('proveedor')->join('proveedor_fisico', 'proveedor_fisico.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('fisico', 'fisico.id_fisico', '=', 'proveedor_fisico.id_fisico')
                                             ->join('telefono_proveedor', 'telefono_proveedor.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_proveedor.id_telefono')
                                             ->select('proveedor.*','fisico.*','proveedor_fisico.*','telefono_proveedor.*','telefono.*')
                                             ->where('proveedor.estatus', '=', 0)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('nombre','LIKE','%'.$texto.'%')
                                                   ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('segundo_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(10);
        return view('proveedoresFisico.papelera_proveedor_fis', compact('proveedores','texto'));
    }
    
    public function recover($id_proveedor)
    {
        $proveedor = Proveedor::findOrFail($id_proveedor);
        $proveedor->estatus = 1;
        $proveedor->save();
        return redirect()->to('/papelera_proveedor_fis');
    }
}
