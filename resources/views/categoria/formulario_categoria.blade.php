@extends('base')
@section('nav')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
        <a href="{{route('home')}}" type="button" class="btn btn-primary"><i class="fa fa-home" style="font-size:15px"></i>&nbsp;Home</a>
    </div>
@endsection
@section('content')
    <div class="container">

        <form class="form-horizontal" action="{{ url('/guardar/categoria') }}" method="POST">
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend class="tittle-foot">
                    {{-- @if (isset($data) && $data['estate']==1)
                        <h3>Actualizar Producto</h3>
                    @else
                        <h1>Crear Producto</h1>
                    @endif --}}
                    <h3>Crear Categoria de Producto</h3>
                </legend>
                <br>
                {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
                @include('flash-message')
                <br>
                {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                

                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="nombre" style="text-align: right"><strong>Nombre*</strong></label></p>
                    </div>
                    <div class="col-md-4">
                        <input id="nombre" name="nombre" type="text" required placeholder="Nombre categoria" pattern="[a-zA-Z ]{2,254}"
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->nombre : '' }}">
                        {{-- <input type="hidden" name="id" value="{{isset($data) && $data['estate']==1 ? $data['info']->id : ''}}"> --}}
                    </div>
                </div>
                <!-- Button -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="guardar"></label></p>
                    </div>
                    <div class="col-md-8">
                        <button id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

                <br>
                <p class="tittle-foot">Creador por Juan Franco</p>
            </fieldset>
        </form>
    </div>

@endsection
