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
                            <form class="col s12" novalidate method="POST" action="{{ route('updateProvFis',  $proveedor->id_proveedor) }}">
                                @csrf
                                @method('PUT')
                                <div><label><strong>DATOS PERSONALES</strong></label>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4 ">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="varchar" class="form-control" name="nombre" id="nombre"
                                            class="validate" placeholder="Nombre" value="{{ $fisico->nombre}}">
                                    </div>
                                    <div class="col s12 m4 ">
                                        <label for="apellido_ap" class="form-label">Primer apellido</label>
                                        <input type="varchar" class="form-control" name="primer_apellido" id="primer_apellido" 
                                            class="validate" placeholder="Primero apellido" value="{{ $fisico->primer_apellido}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="segundo_ap" class="form-label">Segundo apellido</label>
                                        <input type="varchar" class="form-control" name="segundo_apellido" id="segundo_apellido"
                                            class="validate" placeholder="Segundo apellido" value="{{ $fisico->segundo_apellido}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <label for="clave"> Clave Única de Registro de Población (CURP)</label>
                                        <input class="form-control" type="varchar" name="curp" id="curp"
                                            class="validate" placeholder="0000000000000" value="{{ $fisico->curp}}">
                                    </div>
                                    <div class="col s12 m6">
                                        <label for="alias" class="form-label">Registro Federal de Contribuyentes
                                            (RFC)</label>
                                        <input type="varchar" class="form-control" name="rfc" id="rfc"
                                            class="validate" placeholder="00000000000000" value="{{ $proveedor->rfc}}">
                                    </div>
                                </div>
                                <div><label><strong>DATOS DE CONTACTO</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="varchar" class="form-control" name="email" id="email"
                                            class="validate" placeholder="ejemplo@gmail.com" value="{{ $proveedor->email}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="tipo_num" class="form-label">Tipo</label>
                                        <select type="varchar" class="form-control" name="tipo" id="tipo">
                                            <option value="" disabled selected>Desplega la lista...</option>
                                            <option value="Teléfono">Teléfono</option>
                                            <option value="Celular">Celular</option>
                                        </select>
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="tel">Número</label>
                                        <input class="form-control" type="varchar" name="telefono" id="telefono"
                                            class="validate" placeholder="0000000000" value="{{ $telefono->telefono}}">
                                    </div>
                                </div>
                                <div><label><strong>DIRECCIÓN</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="varchar" class="form-control" name="calle" id="calle"
                                            class="validate" placeholder="Calle" value="{{ $proveedor->calle}}">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="entre_cal">Entre calles</label>
                                        <input class="form-control" type="varchar" name="entre_calles" id="entre_calles"
                                            class="validate" placeholder="Entre calles" value="{{ $proveedor->entre_calles}}">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_ext">Número exterior</label>
                                        <input class="form-control" type="varchar" name="no_exterior" id="no_exterior"
                                            class="validate" placeholder="00" value="{{ $proveedor->no_exterior}}">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_int">Número interior</label>
                                        <input class="form-control" type="varchar" name="no_interior" id="no_interior"
                                            class="validate" placeholder="00" value="{{ $proveedor->no_interior}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="cod_pos" class="form-label">Código Postal (C.P.)</label>
                                        <input type="varchar" class="form-control" name="cod_postal" id="cod_postal"
                                            class="validate" placeholder="00000" value="{{ $proveedor->cod_postal}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="colonia">Colonia</label>
                                        <input type="varchar" class="form-control" name="colonia" id="colonia"
                                            class="validate" placeholder="Colonia" value="{{ $proveedor->colonia}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="local">Localidad</label>
                                        <input type="varchar" class="form-control" name="localidad" id="localidad"
                                            class="validate" placeholder="Localidad" value="{{ $proveedor->localidad}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="varchar" class="form-control" name="ciudad" id="ciudad"
                                            class="validate" placeholder="Ciudad" value="{{ $proveedor->ciudad}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="estado">Entidad Federativa (estado)</label>
                                        <input type="varchar" class="form-control" name="entidad_fed" id="entidad_fed"
                                            class="validate" laceholder="Estado" value="{{ $proveedor->entidad_fed}}">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="pais">País</label>
                                        <input type="varchar"class="form-control" name="pais" id="pais"
                                        class="validate" laceholder="Estado" value="{{ $proveedor->pais}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12">
                                        <label for="textarea" class="form-label">Comentarios</label>
                                        <textarea type="varchar" class="form-control validate" name="comentarios" id="comentarios"
                                            placeholder="Comentarios..." data-length="255" value="{{ $proveedor->comentarios}}"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <a href="{{ route('indexProvFis') }}" class="btn-danger dropdown-toggle btn">
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