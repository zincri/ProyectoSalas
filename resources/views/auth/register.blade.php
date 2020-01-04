<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/theme-white.css')}}" />


<div class="page-container">
    <div class="page-content">
        <div class="page-content-wrap">
            {!!Form::open(array('url'=>'registrar','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-horizontal">
                <div class="panel panel-default">


                    <div class="panel-body">

                        <div class="form-group {{$errors->has('nombre') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Nombre</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" />
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
                                        value="{{old('apellido_paterno')}}" />
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
                                        value="{{old('apellido_materno')}}" />
                                </div>
                                {!! $errors->first('apellido_materno','<span class="help-block">:message</span>')!!}

                            </div>
                        </div>

                        <div class="form-group {{$errors->has('edad') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Edad</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="edad" value="{{old('edad')}}" />
                                </div>
                                {!! $errors->first('edad','<span class="help-block">:message</span>')!!}

                            </div>
                        </div>



                        <div class="form-group {{$errors->has('telefono') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Telefono</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="telefono"
                                        value="{{old('telefono')}}" />
                                </div>
                                {!! $errors->first('telefono','<span class="help-block">:message</span>')!!}

                            </div>
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{old('email')}}" />
                                </div>
                                {!! $errors->first('email','<span class="help-block">:message</span>')!!}

                            </div>
                        </div>

                        {{-- <div class="form-group {{$errors->has('token') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Token</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="token" value="{{old('token')}}" />
                                </div>
                                {!! $errors->first('token','<span class="help-block">:message</span>')!!}

                            </div>
                        </div> --}}




                        <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Contraseña</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="password"
                                        value="{{old('password')}}" />
                                </div>
                                {!! $errors->first('password','<span class="help-block">:message</span>')!!}

                            </div>
                        </div>



                        <div class="form-group {{$errors->has('password_confirmation') ? 'has-error':''}}">
                            <label class="col-md-3 col-xs-12 control-label">Confirmar contraseña</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="password_confirmation" />
                                </div>
                                {!! $errors->first('password_confirmation','<span
                                    class="help-block">:message</span>')!!}

                            </div>
                        </div>

                        <div class="panel-footer">
                            <button class="btn btn-primary pull-right" type="submit">Registrar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>