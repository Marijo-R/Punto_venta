@extends('layouts.app')

@section('content') 
        <div id="page-wrapper">     
            <div class="header">
                <h1 class="page-header">
                    <b>ACTUALIZAR PUESTO</b>
                </h1>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <form class="col s12" novalidate method="POST" action="{{ route('updatePues',  $puesto->id_puesto) }}">
                                @csrf
                                @method('PUT')
                                    <div class="row">
                                        <div class=" col s12 m6">
                                            <label for="puesto" class="form-label">Puesto</label>
                                            <input type="varchar" class="form-control validate" name="puesto" id="puesto" autocomplete="puesto" value="{{ $puesto->puesto}}">
                                        </div>
                                    </div>
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <span tooltip="Clic para cancelar la operación" flow="left">
                                                <a href="{{ route('indexPues') }}" class="btn-danger dropdown-toggle btn">
                                                    <i class="material-icons left">cancel</i>CANCELAR
                                                </a>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <span tooltip="Clic para guardar la información" flow="left">
                                                <button type="submit" class="btn btn-success" value="Guardar">
                                                    <i class="material-icons left">check_circle</i>GUARDAR
                                                </button>
                                            </span>
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