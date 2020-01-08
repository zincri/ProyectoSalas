@extends('layouts.master')

@section('content')
<div class="panel-body">

    <h2>{{$datos->nombre}}</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div>
                <div>
                    <h3 class="panel-title"><strong>Descripcion:</strong> </h3>
                </div>
                <div class="panel-body">
                <p>{{$datos->descripcion}}</p>

                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div>
                <div>
                    <h3 class="panel-title"><strong>Estado del evento: </strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->state->nombre}}
                    </p>
                </div>
            </div>
            <div>
                <div>
                    <h3 class="panel-title"><strong>Sala:</strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->sala->nombre}}
                    </p>
                </div>
            </div>

    </div>
    </div>
    <hr>
    <div class="row">
            <h3>GALERIA DEL EVENTO:</h3>
        <div class="gallery" id="links">
            @foreach($fotos as $item)
            <a class="gallery-item" href="{{asset($item->url)}}" data-gallery>
                <div class="image">
                    <img src="{{asset($item->url)}} "  />
                </div>
                <div class="meta">
                    <strong>Imagen</strong>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <br>
    @endsection