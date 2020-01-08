@extends ('layouts.master')

@section ('content')
<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-users"></span> Lista de Usuarios</h2>
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
                                    <input type="text" class="form-control" placeholder="A quien estas buscando?"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-4">
                            <a href="{{ URL::action('Admin\UsuariosController@create')}}"><button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Nuevo usuario</button></a>
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
                        <div class="profile-data-name" >{{$item->name}}</div>
                        <div class="profile-data-title">{{$item->rol}}</div>
                    </div>
                    <div class="profile-controls">
                        <a href="{{ URL::action('Admin\UsuariosController@edit',$item->id)}}" class="profile-control-left"><span class="fa fa-edit"></span></a>
                        
                        <a href="" class="profile-control-right" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><span class="fa fa-trash-o"></span></a>

                    </div>
                    @include('content.usuarios.delete')

                </div>
                <div class="panel-body">
                    <div class="contact-info">
                        <p><small>Telefono</small><br/>{{$item->telefono}}</p>
                        <p><small>Email</small><br/>{{$item->email}}</p>
                        @if (Auth::user()->rol=="admin")
                        <a href="{{ url('resetpassuser/'.$item->id.'')}}"><p><small>Restablecer contraseña</small><br/></p></a>
                        @endif
                    </div>
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
