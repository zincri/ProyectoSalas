@extends ('layouts.master')

@section ('content')
{!!Form::open(array('action'=>['EventosController@update',$datos->id],'method'=>'PATCH','autocomplete'=>'off','files'
=> 'true'))!!}
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">

            <div class="form-group {{$errors->has('nombre') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Nombre del Evento</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="nombre" value="{{$datos->nombre}}" />
                    </div>
                    {!! $errors->first('nombre','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('descripcion') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="descripcion" value="{{$datos->descripcion}}" />
                    </div>
                    {!! $errors->first('descripcion','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Fecha</label>
                <div class="col-md-5 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" class="form-control datepicker" value="{{$datos->fecha}}"
                            data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years"
                            name="fecha">

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Hora inicio</label>
                <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-time"></span></span>
                        <input type="text"
                            class="form-control timepicker24" name="hora_inicio" value="{{$datos->hora_inicio}}"/>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Hora fin</label>
                <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-time"></span></span>
                        <input type="text"
                            class="form-control timepicker24" name="hora_final" value="{{$datos->hora_final}}" />

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">¿Uso de Proyector?</label>
            <div class="col-md-9">
            <input type="radio" name="proyector" value="1"> Si 
            <input type="radio" name="proyector" value="0"> No
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary pull-right" type="submit">Guardar</button>
        </div>
    </div>
</div>
{!!Form::close()!!}

@endsection