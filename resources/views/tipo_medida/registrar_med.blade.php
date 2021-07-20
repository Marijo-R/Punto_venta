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
                                        <label for="unidad_medida" class="form-label">Unidad de medida</label>
                                        <input type="varchar" class="form-control" name="unidad_medida" id="unidad_medida"
                                            class="validate" placeholder="Unidad de medida" required maxlength="15">
                                        @if ($errors->has('unidad_medida'))
                                            <span class="error text-danger">
                                                {{ $errors->first('unidad_medida') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m6 ">
                                        <label for="simbolo" class="form-label">Simbolo</label>
                                        <input type="varchar" class="form-control" name="simbolo" id="simbolo"
                                            class="validate" placeholder="Simbolo" required maxlength="5">
                                        @if ($errors->has('simbolo'))
                                            <span class="error text-danger">
                                                {{ $errors->first('simbolo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <span tooltip="Clic para cancelar la operación" flow="left">
                                                <a href="{{ route('indexMed') }}" onclick="return confirm('¿Está seguro de cancelar la operación?')" 
                                                   class="btn-danger dropdown-toggle btn">
                                                    <i class="material-icons left">cancel</i>{{ __('CANCELAR') }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <span tooltip="Clic para guardar la información" flow="left">
                                                <button onclick="return confirm('¿Está seguro de guardar el nuevo registro de tipo de medida?')" 
                                                        type="submit" class="btn btn-success" value="Guardar">
                                                    <i class="material-icons left">check_circle</i>{{ __('GUARDAR') }}
                                                </button>
                                            </span>
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
