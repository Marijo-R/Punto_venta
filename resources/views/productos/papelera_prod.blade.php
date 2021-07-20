@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>PAPELERA-PRODUCTOS</b>
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
                                            <a href="{{ route('indexProd') }}" class="btn btn-warning">
                                                <i class="material-icons left">arrow_back</i>REGRESAR
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
                                            <form action="{{ route('recycleProd') }}" method="GET">
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
                                            <th class="center">Código</th>
                                            <th class="center">Código alterno</th>
                                            <th class="center">Nombre</th>
                                            <th class="center">Descripción</th>
                                            <th class="center">Marca</th>
                                            <th class="center">Stock</th>
                                            <th class="center">Precio mayoreo</th>
                                            <th class="center">Precio menudeo</th>
                                            <th class="center">Opciones</th>
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
                                                    <td class="center">{{ $producto->precio_mayoreo }}</td>
                                                    <td class="center">{{ $producto->precio_menudeo }}</td>
                                                    <td class="center">
                                                        <a onclick="Alertabtn()">
                                                            <button
                                                                onclick="location.href='{{ route('recoverProd', $producto->id_producto) }}'"
                                                                type="submit" class="btn-primary dropdown-toggle btn"><i
                                                                    class="fa fa-repeat"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_info" id="dataTables-example_info" role="alert"
                                            aria-live="polite" aria-relevant="all">
                                            Mostrando {{ $productos->count() }} de {{ $productos->total() }} entradas
                                        </div>
                                    </div>

                                    <div class="col-sm-4 right">
                                        <div>
                                            {{ $productos->links('vendor.pagination.default') }}
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
