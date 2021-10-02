@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('crear')}}">Crear</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1>Lista de empleados</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Área</th>
                        <th scope="col">Boletín</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)


                    <tr>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->sexo}}</td>
                        <td>{{$empleado->area_id}}</td>
                        <td>{{$empleado->boletin}}</td>
                        <td><a href="">Modificar</a></td>
                        <td><a href="">Eliminar</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
