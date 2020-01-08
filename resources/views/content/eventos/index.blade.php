@extends('layouts.master')

@section('content')
<!-- END PAGE TITLE -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-title">
                        <h2><span class="glyphicon glyphicon-calendar"></span> Listado de Eventos</h2>
                    </div>
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
                            {{-- <th>Hora inicio</th>
                            <th>Hora fin</th> --}}
                            @if (Auth::user()->rol=='admin')
                            <th>Proyector</th>
                            @endif
                            <th>Sala</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->fecha}}</td>
                            {{-- <td>{{$item->hora_inicio}}</td>
                            <td>{{$item->hora_final}}</td> --}}
                            @if (Auth::user()->rol=='admin')
                            <td>
                                @if($item->proyector==1) 
                                @if($item->projector==null)
                                Proyector no especificado
                                @else {{$item->projector->nombre}}
                                @endif
                                @else  Sin proyector
                                @endif
                            </td>
                            @endif
                            <td>{{$item->sala->nombre}}</td>
                            <td>{{$item->state->nombre}}</td>
                            <td>
                                {{-- <a href="{{URL::action('Admin\EventosController@show',$item->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-eye"></i></button></a>
                                &nbsp; --}}
                            @if(Auth::user()->rol=='general')
                                @if($item->state->id==2)
                                <a href="{{ URL::action('EventosController@edit',$item->id)}}"><button
                                    class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                
                                
                                <a href="" class="profile-control-right" data-target="#message-box-danger-{{$item->id}}"
                                    data-toggle="modal"><button class="btn btn-danger"><i
                                            class="fa fa-trash-o"></i></button></a>
                                
                                @endif
                                @include('content.eventos.delete')
                                
                                @if($item->state->id==3)
                                <a href="" class="profile-control-right" data-target="#message-box-cancel-{{$item->id}}"
                                    data-toggle="modal"><button class="btn btn-danger"><i
                                            class="fa fa-times"></i></button></a>
                                @endif
                                @include('content.eventos.cancel')

                                @if(($item->state->id==3 || $item->state->id==5 || $item->state->id==6)&& $item->fecha<=now())
                                <a href="{{ url('eventos/gallery/'.$item->id)}}"><button
                                    class="btn btn-primary"><i class="fa fa-picture-o"></i></button></a>
                                <a href="{{ URL::action('EventosController@show',$item->id)}}"><button
                                    class="btn btn-success"><i class="fa fa-eye"></i></button></a>
                                @endif
                            @endif
                            @if(Auth::user()->rol=='admin')
                            
                            @if($item->state->id!=7)
                            <a href="{{ URL::action('EventosController@show',$item->id)}}"><button
                                class="btn btn-warning"><i class="fa fa-eye"></i></button></a>
                            
                            @endif
                            
                            @if($item->state->id ==2)
                            <a href="{{ url('eventos/accept',$item->id)}}"><button
                                class="btn btn-success"><i class="fa fa-check"></i></button></a>
                            
                            <a href="{{url('eventos/decline',$item->id)}}"><button
                                class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                            
                            @endif

                            @endif
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>
@endsection