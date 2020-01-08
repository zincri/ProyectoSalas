@extends('layouts.master')

@section ('content')
{!!Form::open(array('url'=>['gallery/uploadnewimage/'.$id.''],'method'=>'POST','autocomplete'=>'off',
'files' => 'true'))!!}
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">

            <div class="form-group {{$errors->has('file') ? 'has-error':''}}">

                <label class="col-md-3 col-xs-12 control-label">Sube aqui la imagen:</label>
                <div class="col-md-6 col-xs-12">                               
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file"  name="file" id="file"  class="file" accept="image/*" data-preview-file-type="any"/>
                                {!! $errors->first('file','<span class="help-block">:message</span>')!!}
                            </div>
                        </div>                                                            
                </div>
            </div>

            <div class="panel-footer">
                <button class="btn btn-primary pull-right" type="submit">Agregar Foto</button>
            </div>
        </div>
    </div>
{!!Form::close()!!}

@endsection