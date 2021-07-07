@extends('layouts.app')

@section('content')

        <div id="page-wrapper">
                <div class="header">
                    <h1 class="page-header">
                        <b>BIENVENIDO</b>
                    </h1>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="alert alert-info">
                            <h3 class="center"><strong>¡ ESTÁS CONECTADO !</strong></h3>
                        </div>
                    </div>
                </div>	
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="card">
                                <div class="img_ind  card-image waves-effect waves-block waves-light">
                                    <img  class="activator" src="{{ asset('assets/img/baleros.jpg') }}">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">BALEROS<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">BALEROS<i class="material-icons right">close</i></span>
                                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{ asset('assets/img/Rondamientos.jpg') }}">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">FAROS<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">FAROS<i class="material-icons right">close</i></span>
                                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{ asset('assets/img/bujias_124.jpg') }}">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">BUJIAS<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">BUJIAS<i class="material-icons right">close</i></span>
                                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection