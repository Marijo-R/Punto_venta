@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>PRODUCTOS</b>
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
                                            <a href="{{ route('recycleProd') }}" class="btn btn-warning">
                                                <i class="material-icons left">delete_sweep</i>PAPELERA
                                            </a>
                                        </div>
                                        <div class="btn-group col-md-2 right">
                                            <a href="{{ route('createProd') }}" class="btn btn-success">
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
                                            <form action="{{ route('indexProd') }}" method="GET">
                                                <div class="dataTables_length" id="dataTables-example_length">
                                                    <label>
                                                        Buscar
                                                        <input type="text" name="texto" value="{{ $texto }}"
                                                            class="form-control input-sm"
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
                                            <th class="center">Código</th>
                                            <th class="center">Código alterno</th>
                                            <th class="center">Nombre</th>
                                            <th class="center">Descripción</th>
                                            <th class="center">Marca</th>
                                            <th class="center">Stock</th>
                                            <th class="center">Precio menudeo</th>
                                            <th class="center">Precio mayoreo</th>
                                            <th class="center" scope="col" colspan="3">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($productos) <= 0)
                                            <tr>
                                                <td class="center" colspan="12">No hay resultados</td>
                                            </tr>
                                        @else
                                            @foreach ($productos as $producto)
                                                <tr class="odd gradeX">
                                                    <td class="center">{{ $loop->index + 1 }}</td>
                                                    <td class="center">{{ $producto->codigo }}</td>
                                                    <td class="center">{{ $producto->codigo_alterno }}</td>
                                                    <td class="center">{{ $producto->nombre }}</td>
                                                    <td class="center">{{ $producto->descripcion }}</td>
                                                    <td class="center">{{ $producto->marca }}</td>
                                                    <td class="center">{{ $producto->stock }}</td>
                                                    <td class="center">{{ $producto->precio_menudeo }}</td>
                                                    <td class="center">{{ $producto->precio_mayoreo }}</td>
                                                    <td class="center" WIDTH="70">
                                                        <a href="{{ route('editProd', $producto->id_producto) }}"
                                                            class="btn-primary dropdown-toggle btn">
                                                            <i class="fa fa-pencil-square"></i>
                                                        </a>
                                                    </td>
                                                    <td class="center" WIDTH="70">
                                                        <form action="{{ route('destroyProd', $producto->id_producto) }}"
                                                            method="POST">
                                                            {{ method_field('DELETE') }}
                                                            {{ @csrf_field() }}
                                                            <button type="submit"
                                                                onclick="return confirm('¿Esta seguro de eliminar?')"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="center" WIDTH="70">
                                                        <button data-toggle="modal" data-target="#modalempleado-{{ $producto->id_producto }}"
                                                            type="submit" class="btn btn-info"><i
                                                                class="fa fa-eye"></i></button>
                                                    </td>
                                                </tr>
                                                <!-- Modal de empleados-->
                                                <div class="modal fade" id="modalempleado-{{ $producto->id_producto }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div id="page-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="card">
                                                                                <div class="card-content">
                                                                                    <form class="col s12">
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="email"
                                                                                                    class="form-label">Tipo
                                                                                                    de medida</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="tipo_medida"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->unidad_medida }} ({{ $producto->simbolo }})">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="tel">Stock</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="stock"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->stock }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="entre_cal">Stock
                                                                                                    mínimo</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="stock_min"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->stock_min }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="calle"
                                                                                                    class="form-label">Stock
                                                                                                    máximo</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="stock_max"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->stock_max }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="no_ext">Precio
                                                                                                    menudeo ($)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="precio_menudeo"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->precio_menudeo }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="cod_pos"
                                                                                                    class="form-label">Precio
                                                                                                    mayoreo ($)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="precio_mayoreo"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->precio_mayoreo }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="no_int">Utilidad
                                                                                                    (%)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="utilidad_porcentaje"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->utilidad_porcentaje }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label
                                                                                                    for="colonia">Comisión
                                                                                                    (%)</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="comision_porcentaje"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->comision_porcentaje }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="local">Código
                                                                                                    del SAT</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="codigo_sat"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->codigo_sat }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="ciudad"
                                                                                                    class="form-label">Unidad
                                                                                                    del SAT</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="unidad_sat"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->unidad_sat }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col s12 m6">
                                                                                                <label for="ciudad"
                                                                                                    class="form-label">Usuario</label>
                                                                                            </div>
                                                                                            <div class="col s12 m6">
                                                                                                <input type="varchar"
                                                                                                    class="form-control validate"
                                                                                                    id="unidad_sat"
                                                                                                    disabled="disabled"
                                                                                                    value="{{ $producto->username }}">
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
                                            Mostrando 1 a 4 de 4 entradas
                                        </div>
                                    </div>

                                    <div class="col-sm-3 right">
                                        <div>
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled">
                                                    <a href="#">Anterior</a>
                                                </li>
                                                <li class="paginate_button previous disabled"
                                                    aria-controls="dataTables-example" tabindex="0">
                                                    <a href="#">1</a>
                                                </li>
                                                <li class="paginate_button previous disabled"
                                                    aria-controls="dataTables-example" tabindex="0">
                                                    <a href="#">2</a>
                                                </li>
                                                <li class="paginate_button previous disabled">
                                                    <a href="#">Siguiente</a>
                                                </li>
                                            </ul>
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
