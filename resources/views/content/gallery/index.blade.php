@extends('layouts.master')

@section ('content')
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span> Galeria</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4" style="float: right;">
                    <a href="{{ url('gallery/uploadnewimage/'.$id.'')}}"><button
                            class="btn btn-success btn-block"><span class="fa fa-plus"></span> Agregar
                            Foto</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE TITLE -->   
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">Galeria</h3>
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
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <tr>
                            <td>
                                <img src="{{$item->url}}" alt="imagen" height="60" width="50">
                            </td>
                            <td>
                                <a href="" class="profile-control-right" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button
                                    class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                            </td>
                            @include('content.gallery.delete')
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