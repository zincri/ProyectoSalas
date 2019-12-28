@extends ('layouts.master')

@section ('content')
{!!Form::open(array('action'=>['Admin\UsuariosController@saveresetpass'],'method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                               
                                <div class="panel-body">                                                                        

                                <div class="form-group {{$errors->has('passwordold') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Contraseña antigüa</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control"  name="passwordold" value="{{old('passwordold')}}"/>
                                            </div>                                            
                                            {!! $errors->first('passwordold','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                </div>


                                <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Nueva contraseña</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control"  name="password" value="{{old('password')}}"/>
                                            </div>                                            
                                            {!! $errors->first('password','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                </div>

                                

                                <div class="form-group {{$errors->has('password_confirmation') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Confirmar contraseña nueva</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="password_confirmation"/>
                                            </div>                                            
                                            {!! $errors->first('password_confirmation','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                </div>


                                <div class="panel-footer">                                   
                                    <button class="btn btn-primary pull-right" type="submit">Guardar</button>
                                </div>
                 </div>
                </div>
{!!Form::close()!!}	

@endsection