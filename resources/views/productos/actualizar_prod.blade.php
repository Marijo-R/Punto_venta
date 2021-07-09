@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>ACTUALIZAR PRODUCTO</b>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <form class="col s12" novalidate method="POST" action="{{ route('updateProd',  $producto->id_producto) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col s12 m2 ">
                                        <label for="codigo" class="form-label">Código</label>
                                        <input type="varchar" class="form-control" name="codigo" id="codigo"
                                            class="validate" placeholder="Código" value="{{ $producto->codigo}}">
                                    </div>
                                    <div class="col s12 m3 ">
                                        <label for="codigo_alterno" class="form-label">Código alterno</label>
                                        <input type="varchar" class="form-control" name="codigo_alterno" id="codigo_alterno"
                                            class="validate" placeholder="Código alterno" value="{{ $producto->codigo_alterno}}">
                                    </div>
                                    <div class="col s12 m7">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="varchar" class="form-control" name="nombre" id="nombre"
                                            class="validate" placeholder="Nombre" value="{{ $producto->nombre}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m7">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="varchar" name="descripcion" id="descripcion"
                                            class="form-control validate" placeholder="Descripción..." data-length="255"  value="{{ $producto->descripcion}}"/>
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="marca">Marca</label>
                                        <input name="marca" id="marca" class="form-control" type="varchar" class="validate"
                                            placeholder="Marca" value="{{ $producto->marca}}">
                                    </div>
                                    <div class="col s12 m2">
                                        <label for="marca">Tipo de medida</label>
                                        <select id="id_medida" name="id_medida" type="varchar" class="form-control">
                                            @foreach ($medidas as $medida)
                                                <option value="{{ $medida->id_medida }}">{{ $medida->unidad_medida }}
                                                    ({{ $medida->simbolo }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="stock">Stock</label>
                                        <input id="stock" name="stock" class="form-control" type="varchar" class="validate"
                                            placeholder="00" value="{{ $producto->stock}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="stock_min">Stock mínimo</label>
                                        <input id="stock_min" name="stock_min" class="form-control" type="varchar"
                                            class="validate" placeholder="00" value="{{ $producto->stock_min}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="stock_max">Stock máximo</label>
                                        <input id="stock_max" name="stock_max" class="form-control" type="varchar" class="validate"
                                            placeholder="00" value="{{ $producto->stock_max}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="utilidad_porcentaje">Utilidad (%)</label>
                                        <input id="utilidad_porcentaje" name="utilidad_porcentaje" class="form-control"
                                            type="varchar" class="validate" placeholder="%" value="{{ $producto->utilidad_porcentaje}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="precio_menudeo">Precio menudeo</label>
                                        <input id="precio_menudeo" name="precio_menudeo" class="form-control" type="varchar"
                                            class="validate" placeholder="00" value="{{ $producto->precio_menudeo}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="precio_mayoreo">Precio mayoreo</label>
                                        <input id="precio_mayoreo" name="precio_mayoreo" class="form-control" type="varchar"
                                            class="validate" placeholder="00" value="{{ $producto->precio_mayoreo}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="comision_porcentaje">Comisión (%)</label>
                                        <input id="comision_porcentaje" name="comision_porcentaje" class="form-control"
                                            type="varchar" class="validate" placeholder="00" value="{{ $producto->comision_porcentaje}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="codigo_sat">Código del SAT</label>
                                        <input id="codigo_sat" name="codigo_sat" class="form-control" type="varchar"
                                            class="validate" placeholder="Código SAT" value="{{ $producto->codigo_sat}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="unidad_sat">Unidad del SAT</label>
                                        <input id="unidad_sat" name="unidad_sat" class="form-control" type="varchar"
                                            class="validate" placeholder="Unidad del SAT" value="{{ $producto->unidad_sat}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <a href="{{ route('indexProd') }}" class="btn-danger dropdown-toggle btn">
                                                <i class="material-icons left">cancel</i>CANCELAR
                                            </a>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <button type="submit" class="btn btn-success" value="Guardar">
                                                <i class="material-icons left">check_circle</i>Guardar
                                            </button>
                                        </div>
                                        <div class="btn-group right">
                                            <input id="id_usuario" name="id_usuario" class="form-control" type="hidden"
                                            class="validate" value="{{ auth()->user()->id }}">
                                        </div>
                                        <div class="btn-group right">
                                            <input disabled="disabled" id="usuario" class="form-control" type="varchar"
                                            class="validate" value="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="clearBoth"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
