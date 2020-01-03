@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4" {{-- style="float: right;" --}}>
                    <h1>Token Generado:</h1>
                    <h2>{{$token->token}}</h2>

                    <a href="{{ URL::action('Admin\TokensController@index')}}">
                        <button class="btn btn-primary btn-lg pull-right" type="button"
                        >Regresar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection