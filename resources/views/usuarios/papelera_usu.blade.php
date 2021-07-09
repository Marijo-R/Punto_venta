@extends('layouts.app')

@section('content') 
       <div id="page-wrapper" >
          <div class="header"> 
            <h1 class="page-header">
              <b>PAPELERA USUARIOS</b>
            </h1>  
          </div>

          <div id="page-inner">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-content">
                    <div class="table-responsive">
                      <div class=" col-md-12">
                        <div class="row">
                          <div class="btn-group col-md-2 right">
                            <span tooltip="Clic para regresar al listado de usuarios" flow="left">
                              <a href="{{ route('indexUs') }}" class="btn btn-warning">
                                <i class="material-icons left">arrow_back</i>REGRESAR
                              </a>
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="dataTables_length" id="dataTables-example_length">
                              <label>
                                Registros por página
                                <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                  <option value="10">10</option>
                                  <option value="25">25</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                </select> 
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3 right">
                            <form action="{{ route('recycleUs') }}" method="GET">
                              <div class="dataTables_length" id="dataTables-example_length">
                                <label>
                                  <input type="varchar" name="texto" value="{{ $texto }}" class="form-control input-sm" aria-controls="dataTables-example"
                                          placeholder="Buscar">
                                </label>
                                <button type="submit" class="btn btn-default" value="Buscar">
                                  <span class="glyphicon glyphicon-search"></span>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">ID</th>
                                <th class="center">Usuario</th>
                                <th class="center">Empleado perteneciente</th>
                                <th class="center">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($usuarios)<=0)
                          <tr>
                            <td class="center" colspan="4">No hay resultados</td>
                          </tr>
                          @else
                          @foreach($usuarios as $usuario)
                          <tr class="odd gradeX">
                            <td class="center">{{ $loop->index + 1 }}</td>
                            <td class="center">{{ $usuario->username }}</td>
                            <td class="center">{{$usuario->nombre}} {{$usuario->primer_apellido}}</td>
                            <td class="center">
                              <span tooltip="Clic para reestablecer el registro" flow="left">
                                <a href="{{  route('recoverUs',$usuario->id ) }}" onclick="return confirm('¿Está de reestablecer el registro?')" class="btn-primary dropdown-toggle btn">
                                 <i class="fa fa-repeat"></i>
                                </a>
                              </span>   
                            </td>
                          </tr> 
                          @endforeach
                        @endif
                        </tbody>
                      </table>  

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">
                            Mostrando {{$usuarios->count()}} a {{$usuarios->lastItem()}} de {{$usuarios->total()}} entradas
                          </div>
                        </div>

                        <div class="col-sm-4 right">
                          <div>
                              {{ $usuarios->links('vendor.pagination.default') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>      
            </div>
          </div>  
        </div>

@endsection
