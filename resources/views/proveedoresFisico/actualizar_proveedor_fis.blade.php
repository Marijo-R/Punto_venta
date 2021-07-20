@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>ACTUALIZAR PROVEEDOR</b>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <form class="col s12" novalidate method="POST"
                                action="{{ route('updateProvFis', $proveedor->id_proveedor) }}">
                                @csrf
                                @method('PUT')
                                <div><label><strong>DATOS PERSONALES</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m4 ">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="varchar" class="form-control validate" id="nombre" name="nombre"
                                            placeholder="Nombre" value="{{ $fisico->nombre }}">
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4 ">
                                        <label for="apellido_ap" class="form-label">Primer apellido</label>
                                        <input type="varchar" class="form-control validate" id="primer_apellido"
                                            name="primer_apellido" placeholder="Primer apellido" value="{{ $fisico->primer_apellido }}">
                                        @if ($errors->has('primer_apellido'))
                                            <span class="error text-danger">
                                                {{ $errors->first('primer_apellido') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="segundo_ap" class="form-label">Segundo apellido</label>
                                        <input type="varchar" class="form-control validate" id="segundo_apellido"
                                            name="segundo_apellido" placeholder="Segundo apellido" value="{{ $fisico->segundo_apellido }}">
                                        @if ($errors->has('segundo_apellido'))
                                            <span class="error text-danger">
                                                {{ $errors->first('segundo_apellido') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <label for="clave">
                                            Clave Única de Registro de Población (CURP)</label>
                                        <input type="char" id="curp" name="curp" class="form-control validate"
                                            placeholder="CAPL951007HVZNRVA2" value="{{ $fisico->curp }}">
                                        @if ($errors->has('curp'))
                                            <span class="error text-danger">
                                                {{ $errors->first('curp') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m6">
                                        <label for="rfc"
                                            class="form-label">Registro Federal de Contribuyentes (RFC)</label>
                                        <input type="varchar" id="rfc" name="rfc" class="form-control validate"
                                            placeholder="PECL951007FD5" value="{{ $proveedor->rfc }}">
                                        @if ($errors->has('rfc'))
                                            <span class="error text-danger">
                                                {{ $errors->first('rfc') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div><label><strong>DATOS DE CONTACTO</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input type="varchar" class="form-control validate" id="email" name="email"
                                            placeholder="ejemplo@gmail.com" value="{{ $proveedor->email }}">
                                        @if ($errors->has('email'))
                                            <span class="error text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="tipo_num" class="form-label">Tipo</label>
                                        <select id="tipo" name="tipo" type="varchar" class="form-control">
                                            <option value="" disabled selected>Desplega la lista...</option>
                                            <option value="Teléfono">Teléfono</option>
                                            <option value="Celular">Celular</option>
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <span class="error text-danger">
                                                {{ $errors->first('tipo') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="tel">Número</label>
                                        <input type="varchar" id="telefono" name="telefono" class="form-control validate"
                                            placeholder="0000000000" value="{{ $telefono->telefono }}"> 
                                        @if ($errors->has('telefono'))
                                            <span class="error text-danger">
                                                {{ $errors->first('telefono') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div><label><strong>DIRECCIÓN</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="varchar" class="form-control validate" id="calle" name="calle"
                                            placeholder="Calle" value="{{ $proveedor->calle }}">
                                        @if ($errors->has('calle'))
                                            <span class="error text-danger">
                                                {{ $errors->first('calle') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="entre_cal">Entre calles</label>
                                        <input type="varchar" id="entre_calles" name="entre_calles"
                                            class="form-control validate" placeholder="Entre calles" value="{{ $proveedor->entre_calle }}">
                                        @if ($errors->has('entre_calles'))
                                            <span class="error text-danger">
                                                {{ $errors->first('entre_calles') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_ext">Número exterior</label>
                                        <input type="varchar" id="no_exterior" name="no_exterior"
                                            class="form-control validate" placeholder="0" value="{{ $proveedor->no_exterior }}">
                                        @if ($errors->has('no_exterior'))
                                            <span class="error text-danger">
                                                {{ $errors->first('no_exterior') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_int">Número interior</label>
                                        <input type="varchar" id="no_interior" name="no_interior"
                                            class="form-control validate" placeholder="0" value="{{ $proveedor->no_interior }}">
                                        @if ($errors->has('no_interior'))
                                            <span class="error text-danger">
                                                {{ $errors->first('no_interior') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="cod_pos" class="form-label">Código Postal (C.P.)</label>
                                        <input type="varchar" class="form-control validate" id="cod_postal"
                                            name="cod_postal" placeholder="00000" value="{{ $proveedor->cod_postal }}">
                                        @if ($errors->has('cod_postal'))
                                            <span class="error text-danger">
                                                {{ $errors->first('cod_postal') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="colonia">Colonia</label>
                                        <input type="varchar" id="colonia" class="form-control validate" name="colonia"
                                            placeholder="Colonia" value="{{ $proveedor->colonia }}">
                                        @if ($errors->has('colonia'))
                                            <span class="error text-danger">
                                                {{ $errors->first('colonia') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="local">Localidad</label>
                                        <input type="varchar" id="localidad" class="form-control validate" name="localidad"
                                            placeholder="Localidad" value="{{ $proveedor->localidad }}">
                                        @if ($errors->has('localidad'))
                                            <span class="error text-danger">
                                                {{ $errors->first('localidad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="varchar" id="ciudad" class="form-control validate" name="ciudad"
                                            placeholder="Ciudad" value="{{ $proveedor->ciudad }}">
                                        @if ($errors->has('ciudad'))
                                            <span class="error text-danger">
                                                {{ $errors->first('ciudad') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="estado">Entidad Federativa (estado)</label>
                                        <input type="varchar" id="entidad_fed" name="entidad_fed"
                                            class="form-control validate" placeholder="Estado" value="{{ $proveedor->entidad_fed }}">
                                        @if ($errors->has('entidad_fed'))
                                            <span class="error text-danger">
                                                {{ $errors->first('entidad_fed') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="pais">País</label>
                                        <input type="varchar" id="pais" name="pais" class="form-control validate"
                                            placeholder="País" value="{{ $proveedor->pais }}">
                                        @if ($errors->has('pais'))
                                            <span class="error text-danger">
                                                {{ $errors->first('pais') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12">
                                        <label for="textarea" class="form-label">Comentarios</label>
                                        <input type="varchar" class="form-control" name="comentarios" id="comentarios"
                                            class="validate" placeholder="Comentarios" value="{{ $proveedor->comentarios }}">
                                        @if($errors->has('comentarios'))
                                            <span class="error text-danger">
                                                {{$errors->first('comentarios')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <span tooltip="Clic para cancelar la operación" flow="left">
                                                <a href="{{ route('indexProvFis') }}" onclick="return confirm('¿Está seguro de cancelar la operación?')" 
                                                    class="btn-danger dropdown-toggle btn">
                                                    <i class="material-icons left">cancel</i>{{ __('CANCELAR') }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <span tooltip="Clic para guardar la información" flow="left">
                                                <button onclick="return confirm('¿Está seguro de actualizar el registro de proveedor?')" 
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