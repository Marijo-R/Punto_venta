@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>PROVEEDORES MORALES</b>
            </h1>
        </div>

        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <div class=" col-md-12">
                                    <div class="row">
                                        <div class="btn-group col-md-2 right">
                                            <a href="{{ route('recycleProvMor') }}" class="btn btn-warning">
                                                <i class="material-icons left">delete_sweep</i>PAPELERA
                                            </a>
                                        </div>
                                        <div class="btn-group col-md-2 right">
                                            <a href="{{ route('createProvMor') }}" class="btn btn-success">
                                                <i class="material-icons left">queue</i>REGISTRAR
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="dataTables_length" id="dataTables-example_length">
                                                <label>
                                                    Registros por página
                                                    <select name="dataTables-example_length"
                                                        aria-controls="dataTables-example" class="form-control input-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 right">
                                            <form action="{{ route('indexProvMor') }}" method="GET">
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
                                            <th class="center">Razón social</th>
                                            <th class="center">RFC</th>
                                            <th class="center">Teléfono</th>
                                            <th class="center">Email</th>
                                            <th class="center" scope="col" colspan="3">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($proveedores) <= 0)
                                            <tr>
                                                <td class="center" colspan="12">No hay resultados</td>
                                            </tr>
                                        @else
                                            @foreach ($proveedores as $proveedor)
                                                <tr class="odd gradeX">
                                                    <td class="center">{{ $loop->index + 1 }}</td>
                                                    <td class="center">{{ $proveedor->razon_social }}</td>
                                                    <td class="center">{{ $proveedor->rfc }}</td>
                                                    <td class="center">{{ $proveedor->telefono }}</td>
                                                    <td class="center">{{ $proveedor->email }}</td>
                                                    <td class="center" WIDTH="70">
                                                        <a href="{{ route('editProvMor', $proveedor->id_proveedor) }}"
                                                            class="btn-primary dropdown-toggle btn">
                                                            <i class="fa fa-pencil-square"></i>
                                                        </a>
                                                    </td>
                                                    <td class="center" WIDTH="70">
                                                        <form
                                                            action="{{ route('destroyProvMor', $proveedor->id_proveedor) }}"
                                                            method="POST">
                                                            {{ method_field('DELETE') }}
                                                            {{ @csrf_field() }}
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('El registro no estará disponible para operaciones en el sistema, para reestablecerlo deberá hacerlo desde papelera.')">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="center" WIDTH="70">
                                                        <button data-toggle="modal"
                                                            data-target="#modalproveedor-{{ $proveedor->id_proveedor }}"
                                                            type="submit" class="btn btn-info"><i
                                                                class="fa fa-eye"></i></button>
                                                    </td>
                                                </tr>
                                                <!-- Modal de empleados-->
                                                <div class="modal fade"
                                                    id="modalproveedor-{{ $proveedor->id_proveedor }}" tabindex="-1"
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
                                                                                        <div class="center">
                                                                                            <label><strong>DATOS DE
                                                                                                    CONTACTO</strong></label>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="email"
                                                                                                    class="form-label">Email</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="email"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->email }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="tel">Número de
                                                                                                    teléfono</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="tel"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->telefono }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="center">
                                                                                            <label><strong>DIRECCIÓN</strong></label>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="calle"
                                                                                                    class="form-label">Calle</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="calle"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->calle }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="entre_cal">Entre
                                                                                                    calles</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="entre_cal"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->entre_calles }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="no_ext">Número
                                                                                                    exterior</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="no_ext"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->no_exterior }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="no_int">Número
                                                                                                    interior</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="no_int"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->no_interior }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="cod_pos"
                                                                                                    class="form-label">Código
                                                                                                    Postal (C.P.)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="cod_pos"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->cod_postal }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="colonia">Colonia</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="colonia"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->colonia }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="local">Localidad</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="local"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->localidad }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="ciudad"
                                                                                                    class="form-label">Ciudad</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="ciudad"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->ciudad }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="estado">Entidad
                                                                                                    Federativa
                                                                                                    (estado)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="estado"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->entidad_fed }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="pais">País</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="pais"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->pais }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="pais">Comentarios</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    id="pais"
                                                                                                    class="form-control validate"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $proveedor->comentarios }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    <div class="clearBoth">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Cerrar</button>
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
                                        <div class="dataTables_info" id="dataTables-example_info" role="alert"
                                            aria-live="polite" aria-relevant="all">
                                            Mostrando {{ $proveedores->count() }} de {{ $proveedores->total() }} entradas
                                        </div>
                                    </div>

                                    <div class="col-sm-4 right">
                                        <div>
                                            {{ $proveedores->links('vendor.pagination.default') }}
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
