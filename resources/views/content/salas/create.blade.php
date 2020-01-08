@extends ('layouts.master')

@section ('content')

{!!Form::open(array('url'=>'salas','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group {{$errors->has('nombre') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Nombre de la Sala:</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><span
                                class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="nombre"
                        placeholder="Nombre sala"
                            value="{{old('nombre')}}" />
                    </div>
                    {!! $errors->first('nombre','<span
                        class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('edificio') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Edificio de la sala:</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><span
                                class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="edificio"
                            placeholder="Descripción"
                            value="{{old('edificio')}}" />
                    </div>
                    {!! $errors->first('edificio','<span
                        class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="panel-footer">
                <button class="btn btn-primary pull-right" type="submit">Crear
                    Evento</button>
                    &nbsp;
                    <a href="{{url('salas')}}"><button class="btn btn-default pull-right" type="button">Cancelar</button><a>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}


@endsection