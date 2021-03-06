@extends('layouts.app')

@section('content')

<div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                <b>NUEVO USUARIO</b>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <form class="col s12" method="POST" action="">
                            @csrf
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="usuario" class="form-label">{{ __('Usuario') }}</label>
                                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" 
                                                    value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Usuario" maxlength="15">
                                            @if($errors->has('username'))
                                                <span class="error text-danger">
                                                    {{$errors->first('username')}}
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="password">{{ __('Contraseña')}}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                                                    required autocomplete="new-password" value="{{ old('password') }}" placeholder="Contraseña" maxlength="32">
                                            @if($errors->has('password'))
                                                <span class="error text-danger">
                                                    {{$errors->first('password')}}
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="password">{{ __('Confirmar contraseña') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"placeholder="Contraseña"  
                                                required autocomplete="new-password" maxlength="32">
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col s12 m4">
                                        <label for="num_emp">{{ __('Número de empleado') }}</label>
                                        <input  id="num_emp" class="form-control" type="varchar" class="validate" placeholder="Buscar número de empleado" disabled="disabled">
                                    </div>
                                    <div class="col s12 m8">
                                        <label for="id_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del empleado') }}</label>
                                            <select id='nom_emp' name="id_empleado" type="varchar" class="form-control @error('id_empleado') is-invalid @enderror" onchange='empleadoOpciones();'>
                                                <option value="" disabled selected >Desplega la lista...</option>
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
                                                    <i class="material-icons left">cancel</i>{{ __('CANCELAR') }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-2 right">
                                            <span tooltip="Clic para guardar la información" flow="left">
                                                <button type="submit" class="btn btn-success" onclick="return confirm('¿Está seguro de guardar el nuevo registro de usuario?')">
                                                    <i class="material-icons left">check_circle</i>{{ __('GUARDAR') }}
                                                </button>
                                            </span>
                                        </div>
                                        <div class="btn-group col-sm-3 ">
                                            <span tooltip="Clic para agregar empleado" flow="right">
                                                <a href="{{ route('createEmpl') }}" class="btn-primary dropdown-toggle btn">
                                                    <i class="material-icons left">work</i>{{ __('AGREGAR EMPLEADO')}}
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
    
    <script type="text/javascript">
    // funcion que se ejecuta cada vez que se selecciona una opción
        function empleadoOpciones()
            {
                document.getElementById('num_emp').value=document.getElementById('nom_emp').value;
            }
    </script>

@endsection