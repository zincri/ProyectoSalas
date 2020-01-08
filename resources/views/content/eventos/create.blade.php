@extends ('layouts.master')

@section ('content')

{!!Form::open(array('url'=>'eventos','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <input type="text" class="form-group" style="display:none" name="sala_id"
            value="{{$id}}" />


            <div class="form-group {{$errors->has('nombre') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Nombre del Evento</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><span
                                class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="nombre"
                            value="{{old('nombre')}}" />
                    </div>
                    {!! $errors->first('nombre','<span
                        class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('descripcion') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Descripcion del evento</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><span
                                class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="descripcion"
                            value="{{old('descripcion')}}" />
                    </div>
                    {!! $errors->first('descripcion','<span
                        class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('fecha') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Fecha</label>
                <div class="col-md-9">
                    <div class="input-group">

                        <span class="input-group-addon"><span
                                class="fa fa-calendar"></span></span>
                        <input type="date" class="form-control datepicker"
                            value="{{old('fecha')}}" data-date=""
                            data-date-format="dd-mm-yyyy" data-date-viewmode="years"
                            name="fecha">
                    </div>
                    {!! $errors->first('fecha','<span
                        class="help-block">:message</span>')!!}
                </div>
            </div>


            <div class="form-group {{$errors->has('hora_inicio') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Hora inicio</label>
                <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-time"></span></span>
                        <input type="text"
                            class="form-control timepicker24" name="hora_inicio" value="{{old('hora_inicio')}}" />

                    </div>
                    {!! $errors->first('hora_inicio','<span
                        class="help-block">:message</span>')!!}
                </div>
            </div>

            <div class="form-group {{$errors->has('hora_final') ? 'has-error':''}}">
                <label class="col-md-3 control-label">Hora fin</label>
                <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-time"></span></span>
                        <input type="text"
                            class="form-control timepicker24" name="hora_final" value="{{old('hora_inicio')}}" />

                    </div>
                    {!! $errors->first('hora_final','<span
                        class="help-block">:message</span>')!!}
                </div>
            </div>

            <div class="form-group {{$errors->has('proyector') ? 'has-error':''}}">
                <label class="col-md-3 control-label">¿Uso de Proyector?</label>
                <div class="col-md-9">
                <input type="radio" name="proyector" value="1"> Si 
                <input checked type="radio" name="proyector" value="0"> No
                </div>
                {!! $errors->first('proyector','<span
                        class="help-block">:message</span>')!!}
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