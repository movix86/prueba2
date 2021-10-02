@extends('base')
@section('nav')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
        <a href="{{route('crear')}}" type="button" class="btn btn-primary"><i class="fa fa-user-plus" style="font-size:15px"></i>&nbsp;Crear</a>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1>Lista de empleados</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa fa-user" style="font-size:15px"></i>&nbsp;Nombre</th>
                        <th scope="col"><i class="fa fa-at" style="font-size:15px"></i>&nbsp;Email</th>
                        <th scope="col"><i class="fa fa-intersex" style="font-size:15px"></i>&nbsp;Sexo</th>
                        <th scope="col"><i class="fa fa-briefcase" style="font-size:15px"></i>&nbsp;Área</th>
                        <th scope="col"><i class="fa fa-envelope" style="font-size:15px"></i>&nbsp;Boletín</th>
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
                            <td>{{$empleado->area->nombre}}</td>
                            <td>{{$empleado->boletin}}</td>
                            <td><a href="{{url('/modificar/'.$empleado->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                            <td><a href="javascript:void(0)" onclick="delete_date('/eliminar/empleado/' , {{ $empleado->id }})"><i class="fa fa-trash" data-toggle="modal" data-target="#myModal" style="font-size:24px"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
