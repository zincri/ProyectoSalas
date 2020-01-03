@extends ('layouts.master')

@section ('content')

{!!Form::open(array('url'=>'eventos','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-horizontal">
    <div class="">

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

            <div class="form-group">
                <label class="col-md-3 control-label">Fecha</label>
                <div class="col-md-9">
                    <div class="input-group">

                        <span class="input-group-addon"><span
                                class="fa fa-calendar"></span></span>
                        <input type="date" class="form-control datepicker"
                            value="2019-12-01" data-date="01-12-2019"
                            data-date-format="dd-mm-yyyy" data-date-viewmode="years"
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
                            class="form-control timepicker24" name="hora_inicio" value="06:00" />

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
                            class="form-control timepicker24" name="hora_final" value="06:00" />

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
                <button class="btn btn-primary pull-right" type="submit">Crear
                    Evento</button>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}


@endsection