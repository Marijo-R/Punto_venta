@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>NUEVO PROVEEDOR</b>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <form class="col s12" novalidate method="POST" action="{{ route('storeProvFis') }}">
                                @csrf
                                <div><label><strong>DATOS PERSONALES</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m4 ">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="varchar" class="form-control validate" id="nombre" name="nombre"
                                            placeholder="Nombre">
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4 ">
                                        <label for="apellido_ap" class="form-label">Primer apellido</label>
                                        <input type="varchar" class="form-control validate" id="primer_apellido"
                                            name="primer_apellido" placeholder="Primer apellido">
                                        @if ($errors->has('primer_apellido'))
                                            <span class="error text-danger">
                                                {{ $errors->first('primer_apellido') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="segundo_ap" class="form-label">Segundo apellido</label>
                                        <input type="varchar" class="form-control validate" id="segundo_apellido"
                                            name="segundo_apellido" placeholder="Segundo apellido">
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
                                            Clave ??nica de Registro de Poblaci??n (CURP)</label>
                                        <input type="char" id="curp" name="curp" class="form-control validate"
                                            placeholder="CAPL951007HVZNRVA2">
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
                                            placeholder="PECL951007FD5">
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
                                        <label for="email" class="form-label">Correo Electr??nico</label>
                                        <input type="varchar" class="form-control validate" id="email" name="email"
                                            placeholder="ejemplo@gmail.com">
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
                                            <option value="Tel??fono">Tel??fono</option>
                                            <option value="Celular">Celular</option>
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <span class="error text-danger">
                                                {{ $errors->first('tipo') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="tel">N??mero</label>
                                        <input type="varchar" id="telefono" name="telefono" class="form-control validate"
                                            placeholder="0000000000">
                                        @if ($errors->has('telefono'))
                                            <span class="error text-danger">
                                                {{ $errors->first('telefono') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div><label><strong>DIRECCI??N</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="varchar" class="form-control validate" id="calle" name="calle"
                                            placeholder="Calle">
                                        @if ($errors->has('calle'))
                                            <span class="error text-danger">
                                                {{ $errors->first('calle') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="entre_cal">Entre calles</label>
                                        <input type="varchar" id="entre_calles" name="entre_calles"
                                            class="form-control validate" placeholder="Entre calles">
                                        @if ($errors->has('entre_calles'))
                                            <span class="error text-danger">
                                                {{ $errors->first('entre_calles') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_ext">N??mero exterior</label>
                                        <input type="varchar" id="no_exterior" name="no_exterior"
                                            class="form-control validate" placeholder="0">
                                        @if ($errors->has('no_exterior'))
                                            <span class="error text-danger">
                                                {{ $errors->first('no_exterior') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_int">N??mero interior</label>
                                        <input type="varchar" id="no_interior" name="no_interior"
                                            class="form-control validate" placeholder="0">
                                        @if ($errors->has('no_interior'))
                                            <span class="error text-danger">
                                                {{ $errors->first('no_interior') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="cod_pos" class="form-label">C??digo Postal (C.P.)</label>
                                        <input type="varchar" class="form-control validate" id="cod_postal"
                                            name="cod_postal" placeholder="00000">
                                        @if ($errors->has('cod_postal'))
                                            <span class="error text-danger">
                                                {{ $errors->first('cod_postal') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="colonia">Colonia</label>
                                        <input type="varchar" id="colonia" class="form-control validate" name="colonia"
                                            placeholder="Colonia">
                                        @if ($errors->has('colonia'))
                                            <span class="error text-danger">
                                                {{ $errors->first('colonia') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="local">Localidad</label>
                                        <input type="varchar" id="localidad" class="form-control validate" name="localidad"
                                            placeholder="Localidad">
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
                                            placeholder="Ciudad">
                                        @if ($errors->has('ciudad'))
                                            <span class="error text-danger">
                                                {{ $errors->first('ciudad') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="estado">Entidad Federativa (estado)</label>
                                        <input type="varchar" id="entidad_fed" name="entidad_fed"
                                            class="form-control validate" placeholder="Estado">
                                        @if ($errors->has('entidad_fed'))
                                            <span class="error text-danger">
                                                {{ $errors->first('entidad_fed') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="pais">Pa??s</label>
                                        <input type="varchar" id="pais" name="pais" class="form-control validate"
                                            placeholder="Pa??s">
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
                                            class="validate" placeholder="Comentarios">
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
                                            <span tooltip="Clic para cancelar la operaci??n" flow="left">
                                                <a href="{{ route('indexProvFis') }}" onclick="return confirm('??Est?? seguro de cancelar la operaci??n?')" 
                                                    class="btn-danger dropdown-toggle btn">
                                                    <i class="material-icons left">cancel</i>{{ __('CANCELAR') }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <span tooltip="Clic para guardar la informaci??n" flow="left">
                                                <button onclick="return confirm('??Est?? seguro de guardar el nuevo registro de proveedor?')" 
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
