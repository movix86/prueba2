@extends('base')

@section('content')
    <div class="container">

        <form class="form-horizontal" action="{{ isset($data) ? url('actualizar/empleado/') : url('guardar/empleado/') }}" method="POST">
            @csrf
            <fieldset>

                <!-- Form Name -->
                <legend>
                    <h1>Crear empleado</h1>
                </legend>
                {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
                @include('flash-message')
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
                        <p><label class="control-label" for="nombre" style="text-align: right"><strong>Nombre
                                    completo*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input old('nombre') id="nombre" name="nombre" type="text" placeholder="Nombre completo del empleado"
                            class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="email"><strong>Correo electrónico*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        <input id="email" name="email" type="email" placeholder="Correo electrónico"
                            class="form-control input-md" required="">
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
                                <input type="radio" name="sexo" id="sexo-0" value="m">
                                Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label for="sexo-1">
                                <input type="radio" name="sexo" id="sexo-1" value="f">
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
                            @foreach ($atributos['areas'] as $atributo)
                                <option value="{{$atributo->id}}">{{$atributo->nombre}}</option>
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
                            name="descripcion">Descripción de la experiencia del empleado</textarea>
                    </div>
                </div>

                <!-- Multiple Checkboxes -->
                <div class="row">
                    <div class="col-md-4">
                        <p><label class="control-label" for="roles"><strong>Roles*</strong></label></p>
                    </div>
                    <div class="col-md-8">
                        @foreach ($atributos['roles'] as $roles)
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
            </fieldset>
        </form>
    </div>

@endsection
