@extends('base')
@section('nav')
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <a href="{{route('comprar')}}" type="button" class="btn btn-primary"><i class="fa fa-cart-plus" style="font-size:16px"></i>&nbsp;Comprar</a>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
        <a href="{{url('/crear/categoria')}}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle" style="font-size:15px"></i>&nbsp;Crear Categoria</a>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
        <a href="{{route('crear')}}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle" style="font-size:15px"></i>&nbsp;Crear</a>
        <a href="javascript:void(0)" onclick="create_date('/crear')" data-toggle="modal" data-target="#myModalProductAdd" type="button" class="btn btn-primary"><i class="fa fa-plus-circle" style="font-size:15px"></i>&nbsp;Modal</a>
        {{-- <a href="javascript:void(0)" onclick="create_date('/crear')"><i class="fa fa-trash" data-toggle="modal" data-target="#myModalProductAdd" style="font-size:24px"></i></a></td> --}}
    </div>
@endsection
@section('content')

        @component('components.add_product', ['data' => $data['categories']])
            <x-add_product/>
        @endcomponent

    <div class="container">
        <h2>List<i class="fa fa-amazon" style="font-size:24px"></i> de Pr<i class="fa fa-ravelry" style="font-size:24px"></i>ductos Cafe Express</h2><br>
 
        {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
        @include('flash-message')
        <div class="row">
            <p>* En la seccion <strong>Crear Categoria</strong>, puede generar mas categorias para agrupar productos</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa fa-amazon" style="font-size:15px"></i>&nbsp;Nombre</th>
                        <th scope="col"><i class="fa fa-at" style="font-size:15px"></i>&nbsp;Referencia</th>
                        <th scope="col"><i class="fa fa-dollar" style="font-size:15px"></i>&nbsp;Precio</th>
                        <th scope="col"><i class="fa fa-thumb-tack" style="font-size:15px"></i></i>&nbsp;Peso</th>
                        <th scope="col"><i class="fa fa-university" style="font-size:15px"></i>&nbsp;Categoria</th>
                        <th scope="col"><i class="fa fa-tags" style="font-size:15px"></i></i>&nbsp;Stock</th>
                        <th scope="col"><i class="fa fa-tags" style="font-size:15px"></i></i>&nbsp;Vendidos</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['products'] as $items)
                        <tr>
                            <td>{{$items->nombre}}</td>
                            <td>{{$items->referencia}}</td>
                            <td>{{$items->precio}}</td>
                            <td>{{$items->peso}}</td>
                            <td>{{$items->categoria}}</td>
                            <td>{{$items->stock}}</td>
                            <td>{{$items->num_ventas}}</td>
                            <td><a href="{{url('/modificar/'.$items->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                            <td><a href="javascript:void(0)" onclick="tramite_date('/eliminar/producto/' , {{ $items->id }}, 'eliminar')"><i class="fa fa-trash" data-toggle="modal" data-target="#myModal" style="font-size:24px"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
