@extends('layouts.app')

@section('content') 
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            <b>ACTUALIZAR USUARIO</b>
        </h1>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-content">
                        <form class="col s12" method="POST" action="{{ route('updateUs', $usuario->id) }}">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col s12 m6">
                                    <label for="username" class="form-label">{{ __('Usuario') }}</label>
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" 
                                                required autocomplete="username" autofocus maxlength="15" value="{{ old('username',$usuario->username)}}">
                                        @if($errors->has('username'))
                                            <span class="error text-danger">
                                                {{$errors->first('username')}}
                                            </span>
                                        @endif
                                </div>
                                <div class="col s12 m6">
                                    <label for="password">{{ __('Contraseña')}}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" 
                                            placeholder="Ingrese la contraseña solo en caso de modificarla" maxlength="32" >
                                        @if($errors->has('password'))
                                            <span class="error text-danger">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m4">
                                    <label for="num_emp">Número de empleado</label>
                                    <input  id="num_emp" class="form-control" type="varchar" class="validate" placeholder="Buscar número de empleado" disabled="disabled" >
                                </div>
                                <div class="col s12 m8">
                                    <label for="id_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del empleado') }}</label>
                                        <select id='nom_emp' name="id_empleado" type="varchar" class="form-control" onchange='empleadoOpciones();'>
                                            @foreach($empleados as $empleado)
                                            <option value="{{$empleado->id_empleado}}">{{ $empleado->nombre }} {{ $empleado->primer_apellido }}</option  required>
                                            @endforeach
                                        </select>
                                    @if($errors->has('id_empleado'))
                                        <span class="error text-danger">
                                            {{$errors->first('id_empleado')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m11 offset-m1 xl7 offset-xl1 ">
                                    <div class="btn-group right">
                                        <span tooltip="Clic para cancelar la operación" flow="left">
                                            <a href="{{ route('indexUs') }}" onclick="return confirm('¿Está seguro de cancelar la operación?')" class="btn-danger dropdown-toggle btn">
                                                <i class="material-icons left">cancel</i>CANCELAR
                                            </a>
                                        </span>
                                    </div>
                                    <div class="btn-group col-sm-2 right">
                                        <span tooltip="Clic para guardar la información" flow="left">
                                            <button type="submit" class="btn btn-success" onclick="return confirm('¿Está seguro de guardar las actualizaciones del registro de usuario?')" >
                                                <i class="material-icons left">check_circle</i>{{ __('Guardar') }}
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

<script type="text/javascript">
// funcion que se ejecuta cada vez que se selecciona una opción
    function empleadoOpciones()
        {
            document.getElementById('num_emp').value=document.getElementById('nom_emp').value;
        }
</script>
@endsection