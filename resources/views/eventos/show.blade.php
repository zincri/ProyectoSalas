@extends('layouts.master')

@section('content')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Listado de Eventos</h2>
</div>
<!-- END PAGE TITLE -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
<div class="row">


    <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Eventos</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nombre del Evento</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <td>{{$item}}</td>
                        {{-- <tr>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->fecha}}</td>
                            <td>{{App\User::find($item->cliente_id)->name}}</td>
                            @if ($item->confirmado == 1)
                                <td>Confirmado</td>
                            @else
                                <td>No Confirmado</td>
                            @endif

                            <td>
                                <a href="{{URL::action('Admin\EventosController@show',$item->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-eye"></i></button></a>
                                &nbsp;

                                <a href="{{ url('administrador/uploadimage/'.$item->id.'')}}"><button
                                    class="btn btn-warning"><i class="fa fa-image"></i></button></a>
                                &nbsp;
                                
                                <a href="{{ URL::action('Admin\AbonosController@edit',$item->id)}}"><button
                                    class="btn btn-success"><i class="fa fa-money"></i></button></a>
                                &nbsp;
                            </td>
                            
                        </tr> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>
@endsection