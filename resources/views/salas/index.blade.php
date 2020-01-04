@extends ('layouts.master')

@section ('content')
<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-users"></span> Lista de Usuarios <small>4 usuarios</small></h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Usa la barra buscadora para encontrar a los usuarios.</p>
                    <div class="col-md-8">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Que sala decea?"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="row">
        @foreach ($datos as $item)
        <div class="col-md-3">
            <!-- CONTACT ITEM -->
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        <img src="{{asset('assets/images/users/no-image.jpg')}}"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name" >{{$item->nombre}}</div>
                        <div class="profile-data-title"></div>
                    </div>
                    {{-- <div class="profile-controls">
                        <a href="{{ URL::action('Admin\UsuariosController@edit',$item->id)}}" class="profile-control-left"><span class="fa fa-pecil"></span></a>
                        
                        <a href="" class="profile-control-right" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><span class="fa fa-trash-o"></span></a>

                    </div>
                    @include('content.usuarios.delete') --}}

                </div>
                <div class="panel-footer">
                    <a href="{{ URL::action('SalasController@show',$item->id)}}"><button class="btn btn-success">Apartar Sala</button></a>
                </div>
            </div>
            <!-- END CONTACT ITEM -->
        </div>
        @endforeach
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@endsection
@section('scripts')
<script>
</script>
@endsection