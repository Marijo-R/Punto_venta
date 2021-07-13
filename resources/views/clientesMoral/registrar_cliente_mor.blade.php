@extends('layouts.app')

@section('content')
        <div id="page-wrapper">
            <div class="header">
                <h1 class="page-header">
                    <b>NUEVO CLIENTE MORAL</b>
                </h1>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <form class="col s12" novalidate method="POST" action="{{ route('storeCliFis') }}">
                                @csrf
                                    <div class="row">
                                        <div class="col s12 m2 ">
                                            <label for="numcli" class="form-label">{{ __('No. cliente') }}</label>
                                            <input type="varchar" class="form-control validate" 
                                                    id="no_cliente" name="no_cliente" placeholder="CL10">
                                            @if($errors->has('no_cliente'))
                                                <span class="error text-danger">
                                                    {{$errors->first('no_cliente')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div><label><strong>DATOS DE LA EMPRESA</strong></label></div>
                                    <div class="row">
                                        <div class="col s12 m6 " >
                                            <label for="nombre" class="form-label">{{ __('Razón Social') }}</label>
                                            <input type="varchar" class="form-control validate" id="razon_social" 
                                                    name="razon_social" placeholder="S.A DE C.V" value="{{ old('razon_social') }}">
                                            @if($errors->has('razon_social'))
                                                <span class="error text-danger">
                                                    {{$errors->first('razon_social')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m6">
                                            <label for="rfc" class="form-label">{{ __('Registro Federal de Contribuyentes (RFC)') }}</label>
                                            <input type="varchar" id="rfc" name="rfc" class="form-control validate" 
                                                    placeholder="PAQUIN9510D2" value="{{ old('rfc') }}">
                                            @if($errors->has('rfc'))
                                                <span class="error text-danger">
                                                    {{$errors->first('rfc')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div><label><strong>DATOS DE CONTACTO</strong></label></div>
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <label for="email" class="form-label">{{ __('Correo Electrónico')}}</label>
                                            <input type="varchar" class="form-control validate" id="email" 
                                                name="email"  placeholder="emp.miguelcas06@gmail.com
                                                " value="{{ old('email') }}">
                                            @if($errors->has('email'))
                                                <span class="error text-danger">
                                                    {{$errors->first('email')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="tipo_num" class="form-label">{{ __('Tipo')}}</label>
                                            <select id="tipo" name="tipo" type="varchar" class="form-control">
                                                <option value="" disabled selected >Desplega la lista...</option>
                                                <option value="Teléfono">Teléfono</option>
                                                <option value="Celular">Celular</option>
                                            </select>
                                            @if($errors->has('tipo'))
                                                <span class="error text-danger">
                                                    {{$errors->first('tipo')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="tel">{{ __('Número') }}</label>
                                            <input type="varchar" id="telefono" name="telefono" class="form-control validate" 
                                                placeholder="2721038987" value="{{ old('telefono') }}">
                                            @if($errors->has('telefono'))
                                                <span class="error text-danger">
                                                    {{$errors->first('telefono')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div><label><strong>DIRECCIÓN</strong></label></div>
                                    <div class="row">
                                        <div class="col s12 m3">
                                            <label for="calle" class="form-label">{{ __('Calle') }}</label>
                                            <input type="varchar" class="form-control validate" id="calle" 
                                                name="calle" placeholder="Avenida San Francisco" value="{{ old('calle') }}">
                                            @if($errors->has('calle'))
                                                <span class="error text-danger">
                                                    {{$errors->first('calle')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m3">
                                            <label for="entre_cal">{{ __('Entre calles') }}</label>
                                            <input type="varchar" id="entre_calles" name="entre_calles" class="form-control validate" 
                                                placeholder="Nicólas y Obregón" value="{{ old('entre_calles') }}">
                                            @if($errors->has('entre_calles'))
                                                <span class="error text-danger">
                                                    {{$errors->first('entre_calles')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m3">
                                            <label for="no_ext">{{ __('Número exterior') }}</label>
                                            <input type="varchar" id="no_exterior" name="no_exterior" class="form-control validate" 
                                                placeholder="12" value="{{ old('no_exterior') }}">
                                            @if($errors->has('no_exterior'))
                                                <span class="error text-danger">
                                                    {{$errors->first('no_exterior')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m3">
                                            <label for="no_int">{{ __('Número interior') }}</label>
                                            <input type="varchar" id="no_interior" name="no_interior" class="form-control validate" 
                                                placeholder="20" value="{{ old('no_interior') }}">
                                            @if($errors->has('no_interior'))
                                                <span class="error text-danger">
                                                    {{$errors->first('no_interior')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <label for="cod_pos" class="form-label">{{ __('Código Postal (C.P.)') }}</label>
                                            <input type="varchar" class="form-control validate" id="cod_postal"  
                                                name="cod_postal" placeholder="94734" value="{{ old('cod_postal') }}">
                                            @if($errors->has('cod_postal'))
                                                <span class="error text-danger">
                                                    {{$errors->first('cod_postal')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="colonia">{{ __('Colonia') }}</label>
                                            <input type="varchar" id="colonia" class="form-control validate"
                                                name="colonia" placeholder="Centro" value="{{ old('colonia') }}">
                                            @if($errors->has('colonia'))
                                                <span class="error text-danger">
                                                    {{$errors->first('colonia')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="local">{{ __('Localidad') }}</label>
                                            <input type="varchar" id="localidad"  class="form-control validate" 
                                                name="localidad" placeholder="Maltrata" value="{{ old('localidad') }}">
                                            @if($errors->has('localidad'))
                                                <span class="error text-danger">
                                                    {{$errors->first('localidad')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
                                            <input type="varchar" id="ciudad"  class="form-control validate" 
                                                name="ciudad" placeholder="Orizaba" value="{{ old('ciudad') }}">
                                            @if($errors->has('ciudad'))
                                                <span class="error text-danger">
                                                    {{$errors->first('ciudad')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="estado">{{ __('Entidad Federativa (estado)') }}</label>
                                            <input type="varchar" id="entidad_fed" name="entidad_fed" class="form-control validate" 
                                                placeholder="Veracruz" value="{{ old('entidad_fed') }}">
                                            @if($errors->has('entidad_fed'))
                                                <span class="error text-danger">
                                                    {{$errors->first('entidad_fed')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="pais">{{ __('País') }}</label>
                                            <input type="varchar" id="pais" name="pais" class="form-control validate" 
                                                placeholder="México" value="{{ old('pais') }}">
                                            @if($errors->has('pais'))
                                                <span class="error text-danger">
                                                    {{$errors->first('pais')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div><label><strong>DATOS DE VENTA</strong></label></div>
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <label for="credito" class="form-label">Límite de crédito</label>
                                            <input type="integer"  id="limite_credito" name="limite_credito" class="form-control validate"
                                                     placeholder="$2000.00" value="{{ old('limite_credito') }}">
                                            @if($errors->has('limite_credito'))
                                                <span class="error text-danger">
                                                    {{$errors->first('limite_credito')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="dias">Días de crédito</label>
                                            <input type="integer" id="dias_credito" name="dias_credito" class="form-control validate" 
                                                    placeholder="30" value="{{ old('dias_credito') }}">
                                            @if($errors->has('dias_credito'))
                                                <span class="error text-danger">
                                                    {{$errors->first('dias_credito')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col s12 m4">
                                            <label for="tipo_num" class="form-label">Frecuente</label>
                                            <select  id="frecuente" name="frecuente" type="varchar" class="form-control">
                                                <option value="" disabled selected >Desplega la lista...</option>
                                                <option value="Alto">Alto</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Bajo">Bajo<option>
                                            </select>
                                            @if($errors->has('frecuente'))
                                                <span class="error text-danger">
                                                    {{$errors->first('frecuente')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12">
                                            <label for="textarea" class="form-label">Comentarios</label>
                                            <textarea type="varchar" id="comentarios" name="comentarios" class="form-control validate" 
                                                        placeholder="Venta al cliente de $5,000.00 pesos" data-length="255" value="{{ old('comentarios') }}"></textarea>
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
                                                    <a href="{{ route('indexCliMor') }}" onclick="return confirm('¿Está seguro de cancelar la operación?')" 
                                                        class="btn-danger dropdown-toggle btn">
                                                        <i class="material-icons left">cancel</i>{{ __('CANCELAR') }}
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="btn-group col-sm-2 right">
                                                <span tooltip="Clic para guardar la información" flow="left">
                                                    <button onclick="return confirm('¿Está seguro de guardar el nuevo registro de empleado?')" 
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