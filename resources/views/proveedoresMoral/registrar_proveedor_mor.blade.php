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
                            <form class="col s12" novalidate method="POST" action="{{ route('storeProvMor') }}">
                                @csrf
                                <div><label><strong>DATOS DE LA EMPRESA</strong></label>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <label for="clave"> Razón social</label>
                                        <input class="form-control" type="varchar" name="razon_social" id="razon_social"
                                            class="validate" placeholder="Razón social">
                                    </div>
                                    <div class="col s12 m6">
                                        <label for="alias" class="form-label">Registro Federal de Contribuyentes
                                            (RFC)</label>
                                        <input type="varchar" class="form-control" name="rfc" id="rfc"
                                            class="validate" placeholder="00000000000000">
                                    </div>
                                </div>
                                <div><label><strong>DATOS DE CONTACTO</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="varchar" class="form-control" name="email" id="email"
                                            class="validate" placeholder="ejemplo@gmail.com">
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
                                            class="validate" placeholder="0000000000">
                                    </div>
                                </div>
                                <div><label><strong>DIRECCIÓN</strong></label></div>
                                <div class="row">
                                    <div class="col s12 m3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="varchar" class="form-control" name="calle" id="calle"
                                            class="validate" placeholder="Calle">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="entre_cal">Entre calles</label>
                                        <input class="form-control" type="varchar" name="entre_calles" id="entre_calles"
                                            class="validate" placeholder="Entre calles">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_ext">Número exterior</label>
                                        <input class="form-control" type="varchar" name="no_exterior" id="no_exterior"
                                            class="validate" placeholder="00">
                                    </div>
                                    <div class="col s12 m3">
                                        <label for="no_int">Número interior</label>
                                        <input class="form-control" type="varchar" name="no_interior" id="no_interior"
                                            class="validate" placeholder="00">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="cod_pos" class="form-label">Código Postal (C.P.)</label>
                                        <input type="varchar" class="form-control" name="cod_postal" id="cod_postal"
                                            class="validate" placeholder="00000">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="colonia">Colonia</label>
                                        <input type="varchar" class="form-control" name="colonia" id="colonia"
                                            class="validate" placeholder="Colonia">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="local">Localidad</label>
                                        <input type="varchar" class="form-control" name="localidad" id="localidad"
                                            class="validate" placeholder="Localidad">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="varchar" class="form-control" name="ciudad" id="ciudad"
                                            class="validate" placeholder="Ciudad">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="estado">Entidad Federativa (estado)</label>
                                        <input type="varchar" class="form-control" name="entidad_fed" id="entidad_fed"
                                            class="validate" placeholder="Estado">
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="pais">País</label>
                                        <input type="varchar"class="form-control" name="pais" id="pais"
                                        class="validate" placeholder="Estado">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12">
                                        <label for="textarea" class="form-label">Comentarios</label>
                                        <input type="varchar"class="form-control" name="comentarios" id="comentarios"
                                        class="validate" placeholder="Comentarios...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                        <div class="btn-group right">
                                            <a href="{{ route('indexProvMor') }}" class="btn-danger dropdown-toggle btn">
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
