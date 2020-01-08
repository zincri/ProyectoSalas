@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
            </div>
            <div>
                <h1 style="text-align:center;"> Bienvenido {{Auth::user()->name,}}</h1>
                <h3 style="text-align:center;">Esta página fue hecha con la finalidad de poder reservar las salas audiovisuales</h3>
                 </div>
        </div>
    </div>
</div>
@endsection
