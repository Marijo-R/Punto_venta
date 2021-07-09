<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\puestoCreateRequest;
use App\Http\Requests\puestoEditRequest;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $puestos = DB::table('puesto_empleado')->select('id_puesto','puesto','estatus')
                                               ->where('estatus', '=', 1)
                                               ->where(function ($query) use ($texto) {
                                                    $query->where('puesto','LIKE','%'.$texto.'%');
                                                })
                                              ->orderBy('puesto','asc')
                                              ->paginate(2);
        return view('puesto_empleado.lista_pues', compact('puestos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puesto_empleado.registrar_pues');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(puestoCreateRequest $request)
    {
        $puesto = new Puesto;
        $puesto->puesto = $request->input('puesto');
        $puesto->estatus = 1;
        $puesto->save();
        return redirect()->to('/lista_pues');
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
    public function edit($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        return view('puesto_empleado.actualizar_pues', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(puestoEditRequest $request, $id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        $puesto->puesto = $request->input('puesto');
        $puesto->save();
        return redirect()->to('/lista_pues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        $puesto->estatus = 0;
        $puesto->save();
        return redirect()->to('/lista_pues');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto'));
        //$medidas = TipoMedida::all();
        $puestos = DB::table('puesto_empleado')->select('id_puesto','puesto','estatus')
                                                ->where('estatus', '=', 0)
                                                ->where(function ($query) use ($texto) {
                                                    $query->where('puesto','LIKE','%'.$texto.'%');
                                                })
                                                ->orderBy('puesto','asc')
                                                ->paginate(2);
        return view('puesto_empleado.papelera_pues', compact('puestos','texto'));
    }
    
    public function recover($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        $puesto->estatus = 1;
        $puesto->save();
        return redirect()->to('/papelera_pues');
    }
}
