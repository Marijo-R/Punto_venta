@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>NUEVO TIPO DE MEDIDA</b>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <form class="col s12" novalidate method="POST" action="{{ route('storeMed') }}">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m6 ">
                                        <label for="codigo" class="form-label">Unidad de medida</label>
                                        <input type="varchar" class="form-control" name="unidad_medida" id="unidad_medida"
                                            class="validate" placeholder="Unidad de medida" required maxlength="15">
                                    </div>
                                    <div class="col s12 m6 ">
                                        <label for="codigo_alterno" class="form-label">Simbolo</label>
                                        <input type="varchar" class="form-control" name="simbolo" id="simbolo"
                                            class="validate" placeholder="Simbolo" required maxlength="5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <a href="{{ route('indexMed') }}" class="btn-danger dropdown-toggle btn">
                                                <i class="material-icons left">cancel</i>CANCELAR
                                            </a>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <button type="submit" class="btn btn-success" value="Guardar">
                                                <i class="material-icons left">check_circle</i>Guardar
                                            </button>
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
