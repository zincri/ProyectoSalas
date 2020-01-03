@extends('layouts.master')
@section('content')
    {!!Form::open(array('action'=>['Admin\UsuariosController@update',$datos->id],'method'=>'PATCH','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-content">
                <div class="form-horizontal">
                    <div class="panel panel-default">


                        <div class="panel-body">


                            <div class="form-group {{$errors->has('nombre') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Nombre</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="nombre" value="{{$datos->name}}" />
                                    </div>
                                    {!! $errors->first('nombre','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('apellido_paterno') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Apellido Paterno</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="apellido_paterno"
                                            value="{{$datos->apellido_paterno}}" />
                                    </div>
                                    {!! $errors->first('apellido_paterno','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('apellido_materno') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Apellido Materno</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="apellido_materno"
                                            value="{{$datos->apellido_materno}}" />
                                    </div>
                                    {!! $errors->first('apellido_materno','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('edad') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Edad</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="edad" value="{{$datos->edad}}" />
                                    </div>
                                    {!! $errors->first('edad','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>

                            @if (Auth::user()->rol == "admin")



                            <div class="form-group {{$errors->has('rol') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Rol del Usuario</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="rol">
                                        @if($datos->rol == "admin")
                                        <option value="admin" selected>Admin</option>
                                        <option value="general">General</option>
                                        @else
                                        <option value="admin" >Admin</option>
                                        <option value="general" selected>General</option>
                                        @endif
                                    </select>
                                    {!! $errors->first('rol','<span class="help-block">:message</span>')!!}
                                </div>
                            </div>
                            @endif

                            <div class="form-group {{$errors->has('telefono') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Telefono</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="telefono"
                                            value="{{$datos->telefono}}" />
                                    </div>
                                    {!! $errors->first('telefono','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="email"
                                            value="{{$datos->email}}" />
                                    </div>
                                    {!! $errors->first('email','<span class="help-block">:message</span>')!!}

                                </div>
                            </div>






                            <div class="mb-footer">
                                <button class="btn btn-primary btn-lg pull-right" type="submit">Guardar</button>
                                &nbsp;
                                <a href="{{ URL::action('Admin\UsuariosController@index')}}">
                                    <button class="btn btn-default btn-lg pull-right" type="button"
                                    >Cancelar</button></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    @endsection