@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>PAPELERA-PROVEEDORES FISICOS</b>
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
                                            <a href="{{ route('indexProvFis') }}" class="btn btn-warning">
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
                                            <div class="dataTables_length" id="dataTables-example_length">
                                                <label>
                                                    Buscar
                                                    <input type="search" class="form-control input-sm"
                                                        aria-controls="dataTables-example">
                                                </label>
                                                <button type="submit" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">No.</th>
                                            <th class="center">Nombre completo</th>
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
                                                    <td class="center">
                                                        {{ $proveedor->nombre }} {{ $proveedor->primer_apellido }}
                                                    </td>
                                                    <td class="center">{{ $proveedor->rfc }}</td>
                                                    <td class="center">{{ $proveedor->telefono }}</td>
                                                    <td class="center">{{ $proveedor->email }}</td>
                                                    <td class="center">
                                                        <a onclick="Alertabtn()">
                                                            <button
                                                                onclick="location.href='{{ route('recoverProvFis', $proveedor->id_proveedor) }}'"
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
