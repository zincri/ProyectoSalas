@extends ('layouts.master')

@section ('content')
<!-- PAGE TITLE -->

<!-- END PAGE TITLE -->


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-title">
                    <h2><span class="fa fa-home"></span> Lista de las salas disponibles </h2>
                </div>
                @if (Auth::user()->rol=="admin")
                <div class="col-md-4" style="float: right;">
                    <a href="{{ URL::action('SalasController@create')}}">
                        <button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Nueva
                            Sala</button></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>




<div class="row">
    @foreach ($datos as $item)
    <div class="col-md-3">
        <!-- CONTACT ITEM -->
        <div class="panel panel-default">
            <div class="panel-body profile">
                <div class="profile-image">
                    <img src="{{asset('assets/images/users/no-image.jpg')}}" />
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{$item->nombre}}</div>
                    <div class="profile-data-title"></div>
                </div>
                @if (Auth::user()->rol=="admin")
                <div class="profile-controls">
                    <a href="{{ URL::action('SalasController@edit',$item->id)}}" class="profile-control-left"><span
                            class="fa fa-pencil"></span></a>

                    <a href="" class="profile-control-right" data-target="#message-box-danger-{{$item->id}}"
                        data-toggle="modal"><span class="fa fa-trash-o"></span></a>
                </div>
                @include('content.salas.delete')
                @endif
            </div>
            @if (Auth::user()->rol=="general")
            <div class="panel-footer" >
                <a style="float: right;" href="{{ url('sala/crearevento',$item->id) }}"><button class="btn btn-success">Elegir
                        Sala</button></a>
            </div>
            @endif
        </div>
        <!-- END CONTACT ITEM -->
    </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection