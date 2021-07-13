<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Telefono;
use App\Models\TelefonoEmpleado;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\empleadoCreateRequest;
use App\Http\Requests\empleadoEditRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $empleados = DB::table('empleado')->join('puesto_empleado', 'empleado.id_puesto', '=', 'puesto_empleado.id_puesto')
                                               ->join('telefono_empleado', 'telefono_empleado.id_empleado', '=', 'empleado.id_empleado')
                                               ->join('telefono', 'telefono.id_telefono', '=', 'telefono_empleado.id_telefono')
                                               ->select('empleado.*','puesto_empleado.*','telefono_empleado.*','telefono.*')
                                               ->where('empleado.estatus', '=', 1)
                                               ->where(function ($query) use ($texto) {
                                                $query->where('alias','LIKE','%'.$texto.'%')
                                                     ->orwhere('puesto','LIKE','%'.$texto.'%')
                                                     ->orwhere('nombre','LIKE','%'.$texto.'%')
                                                     ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                     ->orwhere('segundo_apellido','LIKE','%'.$texto.'%');
                                                })
                                            ->paginate(10);
        return view('empleados.lista_empleados', compact('empleados','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::all();
        return view('empleados.registrar_empl', compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empleadoCreateRequest $request)
    {
        $empleado = new Empleado;
        $empleado->id_puesto = $request->input('id_puesto');
        $empleado->alias = $request->input('alias');
        $empleado->nombre = $request->input('nombre');
        $empleado->primer_apellido = $request->input('primer_apellido');
        $empleado->segundo_apellido = $request->input('segundo_apellido');
        $empleado->nss = $request->input('nss');
        $empleado->curp = $request->input('curp');
        $empleado->fecha_nac = $request->input('fecha_nac');
        $empleado->email = $request->input('email');
        $empleado->calle = $request->input('calle');
        $empleado->entre_calles = $request->input('entre_calles');
        $empleado->no_exterior = $request->input('no_exterior');
        $empleado->no_interior = $request->input('no_interior');
        $empleado->cod_postal = $request->input('cod_postal');
        $empleado->colonia = $request->input('colonia');
        $empleado->localidad = $request->input('localidad');
        $empleado->ciudad = $request->input('ciudad');
        $empleado->entidad_fed = $request->input('entidad_fed');
        $empleado->pais = $request->input('pais');
        $empleado->estatus = 1;
        $empleado->save();

        $idEmpleado = DB::table('empleado')->max('id_empleado');

        $telefono = new Telefono;
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->estatus = 1;
        $telefono->save();

        $idTelefono = DB::table('telefono')->max('id_telefono');

        $emplTelefono = new TelefonoEmpleado;
        $emplTelefono->id_empleado = $idEmpleado;
        $emplTelefono->id_telefono = $idTelefono;
        $emplTelefono->save();

        return redirect()->to('/lista_empleados');
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
    public function edit($id_empleado)
    {
        $puestos = Puesto::all();
        $empleado = Empleado::findOrFail($id_empleado);
        return view('empleados.actualizar_empl', compact('empleado', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(empleadoEditRequest $request, $id_empleado,$id_telefono,$id_tel_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        $empleado->id_puesto = $request->input('id_puesto');
        $empleado->alias = $request->input('alias');
        $empleado->nombre = $request->input('nombre');
        $empleado->primer_apellido = $request->input('primer_apellido');
        $empleado->segundo_apellido = $request->input('segundo_apellido');
        $empleado->nss = $request->input('nss');
        $empleado->curp = $request->input('curp');
        $empleado->fecha_nac = $request->input('fecha_nac');
        $empleado->email = $request->input('email');
        $empleado->calle = $request->input('calle');
        $empleado->entre_calles = $request->input('entre_calles');
        $empleado->no_exterior = $request->input('no_exterior');
        $empleado->no_interior = $request->input('no_interior');
        $empleado->cod_postal = $request->input('cod_postal');
        $empleado->colonia = $request->input('colonia');
        $empleado->localidad = $request->input('localidad');
        $empleado->ciudad = $request->input('ciudad');
        $empleado->entidad_fed = $request->input('entidad_fed');
        $empleado->pais = $request->input('pais');
        $empleado->estatus = 1;
        $empleado->save();

        $idEmpleado = DB::table('empleado')->max('id_empleado');

        $telefono = Telefono::findOrFail($id_telefono);
        $telefono->telefono = $request->input('telefono');
        $telefono->tipo = $request->input('tipo');
        $telefono->estatus = 1;
        $telefono->save();

        $idTelefono = DB::table('telefono')->max('id_telefono');

        $emplTelefono = TelefonoEmpleado::findOrFail($id_tel_empleado);
        $emplTelefono->id_empleado = $idEmpleado;
        $emplTelefono->id_telefono = $idTelefono;
        $emplTelefono->save();

        return redirect()->to('/lista_empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        $empleado->estatus = 0;
        $empleado->save();
        return redirect()->to('/lista_empleados');
    }

    public function recycle(Request $request)
    {
        $texto = trim($request->get('texto')); //la palabra que se va a ingresar en la busqueda
        $empleados = DB::table('empleado')->join('puesto_empleado', 'empleado.id_puesto', '=', 'puesto_empleado.id_puesto')
                                               ->join('telefono_empleado', 'telefono_empleado.id_empleado', '=', 'empleado.id_empleado')
                                               ->join('telefono', 'telefono.id_telefono', '=', 'telefono_empleado.id_telefono')
                                               ->select('empleado.*','puesto_empleado.*','telefono_empleado.*','telefono.*')
                                               ->where('empleado.estatus', '=', 0)
                                               ->where(function ($query) use ($texto) {
                                                $query->where('alias','LIKE','%'.$texto.'%')
                                                     ->orwhere('puesto','LIKE','%'.$texto.'%')
                                                     ->orwhere('nombre','LIKE','%'.$texto.'%')
                                                     ->orwhere('primer_apellido','LIKE','%'.$texto.'%')
                                                     ->orwhere('segundo_apellido','LIKE','%'.$texto.'%');
                                                })
                                            ->paginate(10);
        return view('empleados.papelera_empl', compact('empleados','texto'));
    }
    
    public function recover($id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        $empleado->estatus = 1;
        $empleado->save();
        return redirect()->to('/lista_empleados');
    }
}
