<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteMoral;
use App\Models\Moral;
use App\Models\Telefono;
use App\Models\TelefonoCliente;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\clienteMorCreateRequest;
use App\Http\Requests\clienteMorEditRequest;

class ClienteMorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $clientes = DB::table('cliente') ->join('cliente_moral', 'cliente_moral.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('moral', 'moral.id_moral', '=', 'cliente_moral.id_moral')
                                             ->join('telefono_cliente', 'telefono_cliente.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_cliente.id_telefono')
                                             ->select('cliente.*','moral.*','cliente_moral.*','telefono_cliente.*','telefono.*')
                                             ->where('cliente.estatus', '=', 1)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('razon_social','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%')
                                                   ->orwhere('telefono','LIKE','%'.$texto.'%')
                                                   ->orwhere('email','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(5);
        return view('clientesMoral.lista_clientes_mor', compact('clientes','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientesMoral.registrar_cliente_mor');
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

        $cliente = new Cliente;
        $cliente->no_cliente = $request->input('no_cliente');
        $cliente->rfc = $request->input('rfc');
        $cliente->email = $request->input('email');
        $cliente->calle = $request->input('calle');
        $cliente->entre_calles = $request->input('entre_calles');
        $cliente->no_exterior = $request->input('no_exterior');
        $cliente->no_interior = $request->input('no_interior');
        $cliente->cod_postal = $request->input('cod_postal');
        $cliente->colonia = $request->input('colonia');
        $cliente->localidad = $request->input('localidad');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->entidad_fed = $request->input('entidad_fed');
        $cliente->pais = $request->input('pais');
        $cliente->comentarios = $request->input('comentarios');
        $cliente->limite_credito = $request->input('limite_credito');
        $cliente->dias_credito = $request->input('dias_credito');
        $cliente->frecuente = $request->input('frecuente');
        $cliente->estatus = 1;
        $cliente->save();

        $idCliente = DB::table('cliente')->max('id_cliente');

        $cliMoral = new ClienteMoral;
        $cliMoral->id_moral = $idMoral;
        $cliMoral->id_cliente = $idCliente;
        $cliMoral->estatus = 1;
        $cliMoral->save();

        $telefono = new Telefono;
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->estatus = 1;
        $telefono->save();

        $idTelefono = DB::table('telefono')->max('id_telefono');

        $cliTelefono = new TelefonoCliente;
        $cliTelefono->id_cliente = $idCliente;
        $cliTelefono->id_telefono = $idTelefono;
        $cliTelefono->save();

        return redirect()->to('/lista_clientes_mor');
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
    public function edit($id_cliente)
    {
        return view('clientesMoral.actualizar_cliente_mor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        $moral = Moral::findOrFail($id_moral);
        $moral->razon_social = $request->input('razon_social');
        $moral->estatus = 1;
        $moral->save();

        $idMoral = DB::table('moral')->max('id_moral');

        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->no_cliente = $request->input('no_cliente');
        $cliente->rfc = $request->input('rfc');
        $cliente->email = $request->input('email');
        $cliente->calle = $request->input('calle');
        $cliente->entre_calles = $request->input('entre_calles');
        $cliente->no_exterior = $request->input('no_exterior');
        $cliente->no_interior = $request->input('no_interior');
        $cliente->cod_postal = $request->input('cod_postal');
        $cliente->colonia = $request->input('colonia');
        $cliente->localidad = $request->input('localidad');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->entidad_fed = $request->input('entidad_fed');
        $cliente->pais = $request->input('pais');
        $cliente->comentarios = $request->input('comentarios');
        $cliente->limite_credito = $request->input('limite_credito');
        $cliente->dias_credito = $request->input('dias_credito');
        $cliente->frecuente = $request->input('frecuente');
        $cliente->estatus = 1;
        $cliente->save();

        $idCliente = DB::table('cliente')->max('id_cliente');

        $cliMoral = ClienteMoral::findOrFail($id_mor_cliente);
        $cliMoral->id_moral = $idMoral;
        $cliMoral->id_cliente = $idCliente;
        $cliMoral->estatus = 1;
        $cliMoral->save();

        $telefono = Telefono::findOrFail($id_cliente);
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->estatus = 1;
        $telefono->save();

        $idTelefono = DB::table('telefono')->max('id_telefono');

        $cliTelefono = TelefonoCliente::findOrFail($id_tel_cliente);
        $cliTelefono->id_cliente = $idCliente;
        $cliTelefono->id_telefono = $idTelefono;
        $cliTelefono->save();

        return redirect()->to('/lista_clientes_mor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->estatus = 0;
        $cliente->save();
        return redirect()->to('/lista_clientes_mor');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $clientes = DB::table('cliente') ->join('cliente_moral', 'cliente_moral.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('moral', 'moral.id_moral', '=', 'cliente_moral.id_moral')
                                             ->join('telefono_cliente', 'telefono_cliente.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_cliente.id_telefono')
                                             ->select('cliente.*','moral.*','cliente_moral.*','telefono_cliente.*','telefono.*')
                                             ->where('cliente.estatus', '=', 0)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('razon_social','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%')
                                                   ->orwhere('telefono','LIKE','%'.$texto.'%')
                                                   ->orwhere('email','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(5);
        return view('clientesMoral.papelera_cliente_mor', compact('clientes','texto'));
    }
    
    public function recover($id_empleado)
    {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->estatus = 1;
        $cliente->save();
        return redirect()->to('/lista_clientes_mor');
    }
}
