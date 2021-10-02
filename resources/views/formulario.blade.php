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

        <form class="form-horizontal" action="{{ isset($data) && $data['estate']==1 ? url('actualizar/empleado') : url('guardar/empleado/') }}" method="POST">
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend class="tittle-foot">
                    @if (isset($data) && $data['estate']==1)
                        <h1>Actualizar empleado</h1>
                    @else
                        <h1>Crear empleado</h1>
                    @endif
                </legend>
                <br>
                {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
                @include('flash-message')
                <br>
                {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
                {{--
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                --}}
                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="nombre" style="text-align: right"><strong>Nombre
                                    completo*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="nombre" name="nombre" type="text" placeholder="Nombre completo del empleado"
                            class="form-control input-md" value="{{isset($data) && $data['estate']==1 ? $data['info']->nombre : '' }}">
                            <input type="hidden" name="id" value="{{isset($data) && $data['estate']==1 ? $data['info']->id : ''}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="email"><strong>Correo electrónico*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="email" name="email" type="email" placeholder="Correo electrónico"
                            class="form-control input-md" value="{{ isset($data) && $data['estate']==1 ? $data['info']->email : '' }}">
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="sexo"><strong>Sexo*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <div class="radio">
                            <label for="sexo-0">
                                <input type="radio" name="sexo" id="sexo-0" value="M" {{ isset($data) && $data['estate']==1 && $data['info']->sexo=='M' ? 'checked' : '' }}>
                                Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label for="sexo-1">
                                <input type="radio" name="sexo" id="sexo-1" value="F" {{ isset($data) && $data['estate']==1 && $data['info']->sexo=='F' ? 'checked' : '' }}>
                                Femenino
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="area"><strong>Área*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <select id="area" name="area" class="form-control">
                            @foreach ($data['areas'] as $atributo)
                                <option value="{{$atributo->id}}" {{ isset($data) && $data['estate']==1 && $data['info']->area_id==$atributo->id ? 'selected' : '' }}>{{$atributo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="descripcion"><strong>Descripción*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" id="descripcion"
                            name="descripcion">{{ isset($data) && $data['estate']==1 ? $data['info']->descripcion : '' }}</textarea>
                    </div>
                </div>

                <!-- Multiple Checkboxes -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="roles"><strong>Roles*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        @foreach ($data['roles'] as $roles)
                            <div class="checkbox">
                                <label for="roles-0">
                                    <input type="checkbox" name="roles" id="roles-0" value="{{$roles->nombre}}">
                                    {{$roles->nombre}}
                                </label>
                            </div>
                        @endforeach
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
