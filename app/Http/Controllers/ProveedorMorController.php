<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\ProveedorMoral;
use App\Models\Moral;
use App\Models\Telefono;
use App\Models\TelefonoProveedor;
use Illuminate\Support\Facades\DB;

class ProveedorMorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $proveedores = DB::table('proveedor')->join('proveedor_moral', 'proveedor_moral.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('moral', 'moral.id_moral', '=', 'proveedor_moral.id_moral')
                                             ->join('telefono_proveedor', 'telefono_proveedor.id_proveedor', '=', 'proveedor.id_proveedor')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_proveedor.id_telefono')
                                             ->select('proveedor.*','moral.*','proveedor_moral.*','telefono_proveedor.*','telefono.*')
                                             ->where('proveedor.estatus', '=', 1)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('razon_social','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(10);
        return view('proveedoresMoral.lista_proveedores_mor', compact('proveedores','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedoresMoral.registrar_proveedor_mor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moral = new Moral;
        $moral->razon_social = $request->input('razon_social');
        $moral->estatus = 1;
        $moral->save();

        $idMoral = DB::table('moral')->max('id_moral');

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

        $provMoral = new ProveedorMoral;
        $provMoral->id_moral = $idMoral;
        $provMoral->id_proveedor = $idProveedor;
        $provMoral->estatus = 1;
        $provMoral->save();

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

        return redirect()->to('/lista_proveedores_mor');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
