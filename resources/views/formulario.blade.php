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

        <form class="form-horizontal" action="{{ isset($data) && $data['estate']==1 ? url('actualizar/producto') : url('guardar/producto') }}" method="POST">
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend class="tittle-foot">
                    @if (isset($data) && $data['estate']==1)
                        <h3>Actualizar Producto</h3>
                    @else
                        <h1>Crear Producto</h1>
                    @endif
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
                    <div class="col-md-8">
                        <input id="nombre" name="nombre" type="text" placeholder="Nombre del producto" 
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->nombre : '' }}">
                        <input type="hidden" name="id" value="{{isset($data) && $data['estate']==1 ? $data['info']->id : ''}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="email"><strong>Referencia*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="referencia" name="referencia" type="text" placeholder="Referencia"
                            class="form-control input-md" value="{{ isset($data) && $data['estate']==1 ? $data['info']->referencia : '' }}">
                    </div>
                </div>
                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="precio" style="text-align: right"><strong>Precio*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="precio" name="precio" type="number" placeholder="Precio" pattern="[a-zA-Z ]{2,254}"
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->precio : '' }}">
                    </div>
                </div>
                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="peso" style="text-align: right"><strong>Peso*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="peso" name="peso" type="number" placeholder="Peso" pattern="[a-zA-Z ]{2,254}"
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->peso : '' }}">
        
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="categoria"><strong>Categoria*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <select id="categoria" name="categoria" class="form-control">
                            @foreach ($data['category'] as $atributo)
                                <option value="{{$atributo->id}}" {{ isset($data) && $data['estate']==1 && $data['info']->category_id==$atributo->id ? 'selected' : '' }}>{{$atributo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="stock" style="text-align: right"><strong>Stock*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="stock" name="stock" type="number" placeholder="Stock" pattern="[a-zA-Z ]{2,254}"
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->stock : '' }}">
        
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
