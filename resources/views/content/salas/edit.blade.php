@extends ('layouts.master')

@section ('content')
{!!Form::open(array('action'=>['SalasController@update',$datos->id],'method'=>'PATCH','autocomplete'=>'off','files'
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

            <div class="form-group {{$errors->has('edificio') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Edificio</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="edificio" value="{{$datos->edificio}}" />
                    </div>
                    {!! $errors->first('edificio','<span class="help-block">:message</span>')!!}

                </div>
            </div>

        <div class="panel-footer">
            <button class="btn btn-primary pull-right" type="submit">Guardar</button>
            &nbsp;
                <a href="{{url('salas')}}"><button class="btn btn-default pull-right" type="button">Cancelar</button><a>
        </div>
    </div>
</div>
{!!Form::close()!!}

@endsection