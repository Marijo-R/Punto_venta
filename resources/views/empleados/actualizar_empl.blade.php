@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            <b>ACTUALIZAR EMPLEADO</b>
        </h1>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-content">
                        <form class="col s12" novalidate method="POST" action="{{ route('updateEmpl',  $empleado->id_empleado) }}">
                            <div><label><strong>DATOS PERSONALES</strong></label></div>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col s12 m2">
                                    <label for="marca">{{ __('Puesto') }}</label>
                                    <select id="idPuesto" name="id_puesto" type="varchar" class="form-control">
                                        <option disabled selected>Desplega la lista...</option>
                                        @foreach ($puestos as $puesto)
                                            <option value="{{ $puesto->id_puesto }}">{{ $puesto->puesto }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('id_puesto'))
                                        <span class="error text-danger">
                                            {{$errors->first('id_puesto')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m2 ">
                                    <label for="alias" class="form-label">{{ __('Alias') }}</label>
                                    <input type="varchar" class="form-control" id="alias" 
                                          name="alias" placeholder="Eve" value="{{ old('alias',$empleado->alias)}}">
                                    @if($errors->has('alias'))
                                        <span class="error text-danger">
                                            {{$errors->first('alias')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3 ">
                                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                    <input type="varchar" class="form-control validate" id="nombre" 
                                            name="nombre" placeholder="Evelyn" value="{{ old('nombre',$empleado->nombre)}}">
                                    @if($errors->has('nombre'))
                                        <span class="error text-danger">
                                            {{$errors->first('nombre')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3 ">
                                    <label for="apellido_ap" class="form-label">{{__('Primer apellido')}}</label>
                                    <input type="varchar" class="form-control validate" id="primer_apellido"  
                                         name="primer_apellido" placeholder="Baz" value="{{ old('primer_apellido',$empleado->primer_apellido)}}">
                                    @if($errors->has('primer_apellido'))
                                        <span class="error text-danger">
                                            {{$errors->first('primer_apellido')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m2">
                                    <label for="segundo_ap" class="form-label">{{ __('Segundo apellido')}}</label>
                                    <input type="varchar" class="form-control validate" id="segundo_apellido" 
                                          name="segundo_apellido" placeholder="Pérez" value="{{ old('segundo_apellido',$empleado->segundo_apellido)}}">
                                    @if($errors->has('segundo_apellido'))
                                        <span class="error text-danger">
                                            {{$errors->first('segundo_apellido')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m4">
                                    <label for="num_seg">{{ __('Número de Seguro Social (NSS)') }}</label>
                                    <input type="char" id="nss" class="form-control validate" 
                                           name="nss" placeholder="72795608040" value="{{ old('nss',$empleado->nss)}}">
                                    @if($errors->has('nss'))
                                        <span class="error text-danger">
                                            {{$errors->first('nss')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m5">
                                    <label for="clave"> {{ __('Clave Única de Registro de Población (CURP)') }}</label>
                                    <input type="char" id="curp" name="curp" class="form-control validate" 
                                           placeholder="BAPE001011MVZNRVA6" value="{{ old('curp',$empleado->curp)}}">
                                    @if($errors->has('curp'))
                                        <span class="error text-danger">
                                            {{$errors->first('curp')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3">
                                    <label for="fecha_nac">{{ __('Fecha de nacimiento')}}</label>
                                    <input type="varchar" id="fecha_nac" name="fecha_nac" class="form-control validate" 
                                           placeholder="2000-10-11 --> año-mes-día" value="{{ old('fecha_nac',$empleado->fecha_nac)}}">
                                    @if($errors->has('fecha_nac'))
                                        <span class="error text-danger">
                                            {{$errors->first('fecha_nac')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div><label><strong>DATOS DE CONTACTO</strong></label></div>
                            <div class="row">
                                <div class="col s12 m4">
                                    <label for="email" class="form-label">{{ __('Correo Electrónico')}}</label>
                                    <input type="varchar" class="form-control validate" id="email" 
                                          name="email"  placeholder="evemi1110@gmail.com" value="{{ old('email',$empleado->email)}}">
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
                                           placeholder="2721478987" value="{{ old('telefono',$empleado->telefono) }}"> 
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
                                           name="calle" placeholder="Avenida San Juan" value="{{ old('calle',$empleado->calle)}}">
                                    @if($errors->has('calle'))
                                        <span class="error text-danger">
                                            {{$errors->first('calle')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3">
                                    <label for="entre_cal">{{ __('Entre calles') }}</label>
                                    <input type="varchar" id="entre_calles" name="entre_calles" class="form-control validate" 
                                           placeholder="Mezón y Guadalupe" value="{{ old('entre_calles',$empleado->entre_calles)}}">
                                    @if($errors->has('entre_calles'))
                                        <span class="error text-danger">
                                            {{$errors->first('entre_calles')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3">
                                    <label for="no_int">{{ __('Número interior') }}</label>
                                    <input type="varchar" id="no_interior" name="no_interior" class="form-control validate" 
                                          placeholder="18" value="{{ old('no_interior',$empleado->no_interior)}}">
                                    @if($errors->has('no_interior'))
                                        <span class="error text-danger">
                                            {{$errors->first('no_interior')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m3">
                                    <label for="no_ext">{{ __('Número exterior') }}</label>
                                    <input type="varchar" id="no_exterior" name="no_exterior" class="form-control validate" 
                                           placeholder="12" value="{{ old('no_exterior',$empleado->no_exterior)}}">
                                    @if($errors->has('no_exterior'))
                                        <span class="error text-danger">
                                            {{$errors->first('no_exterior')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m4">
                                    <label for="cod_pos" class="form-label">{{ __('Código Postal (C.P.)') }}</label>
                                    <input type="varchar" class="form-control validate" id="cod_postal"  
                                          name="cod_postal" placeholder="94760" value="{{ old('cod_postal',$empleado->cod_postal)}}">
                                    @if($errors->has('cod_postal'))
                                        <span class="error text-danger">
                                            {{$errors->first('cod_postal')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m4">
                                    <label for="colonia">{{ __('Colonia') }}</label>
                                    <input type="varchar" id="colonia" class="form-control validate"
                                           name="colonia" placeholder="Centro" value="{{ old('colonia',$empleado->colonia)}}">
                                    @if($errors->has('colonia'))
                                        <span class="error text-danger">
                                            {{$errors->first('colonia')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m4">
                                    <label for="local">{{ __('Localidad') }}</label>
                                    <input type="varchar" id="localidad"  class="form-control validate" 
                                          name="localidad" placeholder="Acultzingo" value="{{ old('localidad',$empleado->localidad)}}">
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
                                          name="ciudad" placeholder="Orizaba" value="{{ old('ciudad',$empleado->ciudad)}}">
                                    @if($errors->has('ciudad'))
                                        <span class="error text-danger">
                                            {{$errors->first('ciudad')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m4">
                                    <label for="estado">{{ __('Entidad Federativa (estado)') }}</label>
                                    <input type="varchar" id="entidad_fed" name="entidad_fed" class="form-control validate" 
                                           placeholder="Veracruz" value="{{ old('entidad_fed',$empleado->entidad_fed)}}">
                                    @if($errors->has('entidad_fed'))
                                        <span class="error text-danger">
                                            {{$errors->first('entidad_fed')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s12 m4">
                                    <label for="pais">{{ __('País') }}</label>
                                    <input type="varchar" id="pais" name="pais" class="form-control validate" 
                                           placeholder="México" value="{{ old('pais',$empleado->pais)}}">
                                    @if($errors->has('pais'))
                                        <span class="error text-danger">
                                            {{$errors->first('pais')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                    <div class="btn-group right">
                                        <span tooltip="Clic para cancelar la operación" flow="left">
                                            <a href="{{ route('indexEmpl') }}" onclick="return confirm('¿Está seguro de cancelar la operación?')" 
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
                                    <div class="btn-group col-sm-3 ">
                                        <span tooltip="Clic para agregar puesto" flow="right">
                                            <a href="{{ route('createPues') }}" class="btn-primary dropdown-toggle btn">
                                                <i class="material-icons left">group_add</i>{{ __('AGREGAR PUESTO') }}
                                            </a>
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