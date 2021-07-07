<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoMedida;
use Illuminate\Support\Facades\DB;

class TipoMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        //$medidas = TipoMedida::all();
        $medidas = DB::table('tipo_medida')->select('id_medida','unidad_medida','simbolo', 'estatus')
                                           ->where('estatus', '=', 1)
                                           ->where(function ($query) use ($texto) {
                                                $query->where('unidad_medida','LIKE','%'.$texto.'%')
                                                      ->orWhere('simbolo','LIKE','%'.$texto.'%');
                                            })
                                           ->orderBy('unidad_medida','asc')
                                           ->paginate(10);
        return view('tipo_medida.lista_medidas', compact('medidas','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_medida.registrar_med');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medida = new TipoMedida;
        $medida->unidad_medida = $request->input('unidad_medida');
        $medida->simbolo = $request->input('simbolo');
        $medida->estatus = 1;
        $medida->save();
        return redirect()->to('/lista_medidas');
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
    public function edit($id_medida)
    {
        $medida = TipoMedida::findOrFail($id_medida);
        return view('tipo_medida.actualizar_med', compact('medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_medida)
    {
        $medida = TipoMedida::findOrFail($id_medida);
        $medida->unidad_medida = $request->input('unidad_medida');
        $medida->simbolo = $request->input('simbolo');
        $medida->save();
        return redirect()->to('/lista_medidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_medida)
    {
        $medida = TipoMedida::findOrFail($id_medida);
        $medida->estatus = 0;
        $medida->save();
        return redirect()->to('/lista_medidas');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto'));
        //$medidas = TipoMedida::all();
        $medidas = DB::table('tipo_medida')->select('id_medida','unidad_medida','simbolo', 'estatus')
                                           ->where('estatus', '=', 0)
                                           ->where(function ($query) use ($texto) {
                                                $query->where('unidad_medida','LIKE','%'.$texto.'%')
                                                      ->orWhere('simbolo','LIKE','%'.$texto.'%');
                                            })
                                           ->orderBy('unidad_medida','asc')
                                           ->paginate(10);
        return view('tipo_medida.papelera_med', compact('medidas','texto'));
    }
    
    public function recover($id_medida)
    {
        $medida = TipoMedida::findOrFail($id_medida);
        $medida->estatus = 1;
        $medida->save();
        return redirect()->to('/papelera_medida');
    }
}
