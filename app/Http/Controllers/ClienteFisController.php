<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteFisico;
use App\Models\Fisico;
use App\Models\Telefono;
use App\Models\TelefonoCliente;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\clienteFisCreateRequest;
use App\Http\Requests\clienteFisEditRequest;

class ClienteFisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $clientes = DB::table('cliente')->join('cliente_fisico', 'cliente_fisico.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('fisico', 'fisico.id_fisico', '=', 'cliente_fisico.id_fisico')
                                             ->join('telefono_cliente', 'telefono_cliente.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_cliente.id_telefono')
                                             ->select('cliente.*','fisico.*','cliente_fisico.*','telefono_cliente.*','telefono.*')
                                             ->where('cliente.estatus', '=', 1)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('nombre','LIKE','%'.$texto.'%')
                                                   ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('segundo_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(5);
        return view('clientesFisico.lista_clientes_fis', compact('clientes','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientesFisico.registrar_cliente_fis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(clienteFisCreateRequest $request)
    {
        $fisico = new Fisico;
        $fisico->nombre = $request->input('nombre');
        $fisico->primer_apellido = $request->input('primer_apellido');
        $fisico->segundo_apellido = $request->input('segundo_apellido');
        $fisico->curp = $request->input('curp');
        $fisico->estatus = 1;
        $fisico->save();

        $idFisico = DB::table('fisico')->max('id_fisico');

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

        $cliFisico = new ClienteFisico;
        $cliFisico->id_fisico = $idFisico;
        $cliFisico->id_cliente = $idCliente;
        $cliFisico->estatus = 1;
        $cliFisico->save();

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

        return redirect()->to('/lista_clientes_fis');
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
        return view('clientesFisico.actualizar_cliente_fis');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(clienteFisEditRequest $request, $id_cliente)
    {
        $fisico = Fisico::findOrFail($id_fisico);
        $fisico->nombre = $request->input('nombre');
        $fisico->primer_apellido = $request->input('primer_apellido');
        $fisico->segundo_apellido = $request->input('segundo_apellido');
        $fisico->curp = $request->input('curp');
        $fisico->estatus = 1;
        $fisico->save();

        $idFisico = DB::table('fisico')->max('id_fisico');

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

        $cliFisico = ClienteFisico::findOrFail($id_fis_cliente);
        $cliFisico->id_fisico = $idFisico;
        $cliFisico->id_cliente = $idCliente;
        $cliFisico->estatus = 1;
        $cliFisico->save();

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

        return redirect()->to('/lista_clientes_fis');
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
        return redirect()->to('/lista_clientes_fis');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $clientes = DB::table('cliente')->join('cliente_fisico', 'cliente_fisico.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('fisico', 'fisico.id_fisico', '=', 'cliente_fisico.id_fisico')
                                             ->join('telefono_cliente', 'telefono_cliente.id_cliente', '=', 'cliente.id_cliente')
                                             ->join('telefono', 'telefono.id_telefono', '=', 'telefono_cliente.id_telefono')
                                             ->select('cliente.*','fisico.*','cliente_fisico.*','telefono_cliente.*','telefono.*')
                                             ->where('cliente.estatus', '=', 0)
                                             ->where(function ($query) use ($texto) {
                                              $query->where('nombre','LIKE','%'.$texto.'%')
                                                   ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('segundo_apellido','LIKE','%'.$texto.'%')
                                                   ->orwhere('rfc','LIKE','%'.$texto.'%');
                                              })
                                            ->paginate(5);
        return view('clientesFisico.papelera_cliente_fis', compact('clientes','texto'));
    }
    
    public function recover($id_empleado)
    {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->estatus = 1;
        $cliente->save();
        return redirect()->to('/lista_clientes_fis');
    }
}
