@extends('layouts.app')

@section('content')

<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">
            <b>EMPLEADOS</b>
        </h1>  
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                            <div class=" col s12">
                                <div class="row">
                                    <div class="btn-group  col s12 m2 right">
                                        <span tooltip="Clic para recuperar registros eliminados" flow="left">
                                            <a href="{{ route('recycleEmpl') }}" class="btn btn-warning">
                                                <i class="material-icons left">delete_sweep</i>PAPELERA
                                            </a>
                                        </span>
                                    </div>
                                    <div class="btn-group col s12 m2 right">
                                        <span tooltip="Clic para registrar nuevo empleado" flow="left">
                                            <a href="{{ route('createEmpl') }}" class="btn btn-success">
                                                <i class="material-icons left">queue</i>REGISTRAR
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dataTables_length" id="dataTables-example_length">
                                            <label>
                                                Registros por página
                                                <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 right">
                                        <form action="{{ route('indexEmpl') }}" method="GET">
                                            <div class="dataTables_length" id="dataTables-example_length">
                                                <label>
                                                    <input type="varchar" name="texto" value="{{ $texto }}"
                                                            class="form-control input-sm" placeholder="Buscar"
                                                            aria-controls="dataTables-example">
                                                </label>
                                                <button type="submit" class="btn btn-default" value="Buscar">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">No.</th>
                                        <th class="center">Alias</th>
                                        <th class="center">Puesto</th>
                                        <th class="center">Nombre completo</th>
                                        <th class="center">Teléfono</th>
                                        <th class="center">Email</th>
                                        <th class="center" scope="col" colspan="3">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($empleados) <= 0)
                                        <tr>
                                            <td class="center" colspan="12">No hay resultados</td>
                                        </tr>
                                    @else
                                    @foreach ($empleados as $empleado)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ $loop->index + 1 }}</td>
                                            <td class="center">{{ $empleado->alias }}</td>
                                            <td class="center">{{ $empleado->puesto }}</td>
                                            <td class="center">
                                                {{ $empleado->nombre }} {{ $empleado->primer_apellido }} {{ $empleado->segundo_apellido }}
                                            </td> 
                                            <td class="center">{{ $empleado->telefono }}</td>
                                            <td class="center">{{ $empleado->email }}</td> 
                                            <td class="center" WIDTH="70">
                                                <span tooltip="Clic para ver más detalles" flow="left">
                                                    <button  data-toggle="modal" data-target="#modalempleado-{{ $empleado->id_empleado }}"
                                                         type="submit" class="btn btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </span>
                                            </td>
                                            <td class="center" WIDTH="70">
                                                <span tooltip="Clic para editar empleado" flow="left">
                                                    <a href="{{ route('editEmpl', $empleado->id_empleado) }}"
                                                        class="btn-primary dropdown-toggle btn">
                                                        <i class="fa fa-pencil-square"></i>
                                                    </a>
                                                </span>
                                            </td>
                                            <td class="center" WIDTH="70">
                                                <span tooltip="Clic para eliminar empleado" flow="left">
                                                    <form action="{{ route('destroyEmpl', $empleado->id_empleado) }}"
                                                        method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ @csrf_field() }} 
                                                        <button type="submit"  class="btn btn-danger"
                                                                onclick="return confirm('El registro no estará disponible para operaciones en el sistema, para reestablecerlo deberá hacerlo desde papelera')"
                                                               >
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                                <!-- Modal de empleados-->
                                        <div class="modal fade" id="modalempleado-{{ $empleado->id_empleado }}" tabindex="-1" 
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div id="page-inner">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-content">
                                                                            <form class="col s12">
                                                                                <div class="center"><label><strong>DATOS PERSONALES</strong></label></div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="num_seg">Número de Seguro Social (NSS)</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="char" id="num_seg" disabled="disabled" 
                                                                                                class="form-control validate"
                                                                                                value="{{ $empleado->nss }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="clave"> Clave Única de Registro de Población (CURP)</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="char" id="clave" disabled="disabled" 
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->curp }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="fecha_nac">Fecha de nacimiento</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="fecha_nac" disabled="disabled" 
                                                                                              class="form-control validate" 
                                                                                              value="{{ $empleado->fecha_nac }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="center"><label><strong>DIRECCIÓN</strong></label></div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="calle" class="form-label">Calle</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" disabled="disabled" id="calle"
                                                                                                class="form-control validate"  
                                                                                                value="{{ $empleado->calle }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="entre_cal">Entre calles</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="entre_cal" disabled="disabled"
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->entre_calles }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="no_int">Número interior</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="no_int" disabled="disabled"
                                                                                                class="form-control validate"  
                                                                                                value="{{ $empleado->no_interior }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="no_ext">Número exterior</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="no_ext" disabled="disabled" 
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->no_exterior}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="cod_pos" class="form-label">Código Postal (C.P.)</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="cod_pos" disabled="disabled" 
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->cod_postal }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="colonia">Colonia</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="colonia" disabled="disabled"
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->colonia }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="local">Localidad</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="local" disabled="disabled"
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->localidad }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="ciudad" class="form-label">Ciudad</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="ciudad" disabled="disabled" 
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->ciudad }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="estado">Entidad Federativa (estado)</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="estado" disabled="disabled"
                                                                                                class="form-control validate" 
                                                                                                value="{{ $empleado->entidad_fed }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col s12 m6">
                                                                                        <label for="pais">País</label>
                                                                                    </div>
                                                                                    <div class="col s12 m6">
                                                                                        <input type="varchar" id="pais" disabled="disabled" 
                                                                                                class="form-control validate"
                                                                                                value="{{ $empleado->pais }}">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="clearBoth">
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>  

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">
                                        Mostrando {{$empleados->count()}} a {{$empleados->lastItem()}} de {{$empleados->total()}} entradas
                                    </div>
                                </div>

                                <div class="col-sm-4 right">
                                    <div>
                                        {{ $empleados->links('vendor.pagination.default') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>      
        </div>
    </div>  
</div>
@endsection