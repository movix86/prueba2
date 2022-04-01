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
        <h2>List<i class="fa fa-amazon" style="font-size:24px"></i> de Pr<i class="fa fa-ravelry" style="font-size:24px"></i>ductos</h2><br>
 
        {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
        @include('flash-message')
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa fa-amazon" style="font-size:15px"></i>&nbsp;Nombre</th>
                        <th scope="col"><i class="fa fa-at" style="font-size:15px"></i>&nbsp;Referencia</th>
                        <th scope="col"><i class="fa fa-dollar" style="font-size:15px"></i>&nbsp;Precio</th>
                        <th scope="col"><i class="fa fa-thumb-tack" style="font-size:15px"></i></i>&nbsp;Peso</th>
                        <th scope="col"><i class="fa fa-university" style="font-size:15px"></i>&nbsp;Categoria</th>
                        <th scope="col"><i class="fa fa-tags" style="font-size:15px"></i></i>&nbsp;Stock</th>
                        {{-- <th scope="col">Modificar</th> --}}
                        <th scope="col">Comprar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $items)
                        <tr>
                            <td>{{$items->nombre}}</td>
                            <td>{{$items->referencia}}</td>
                            <td>{{$items->precio}}</td>
                            <td>{{$items->peso}}</td>
                            <td>{{$items->categoria}}</td>
                            <td>{{$items->stock}}</td>

                            {{-- <td><a href="{{url('/modificar/'.$items->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td> --}}
                            <td><a href="javascript:void(0)" onclick="tramite_date('/transaccion/producto/' , {{ $items->id }}, 'vender')"><i class="fa fa-money" data-toggle="modal" data-target="#myModal" style="font-size:24px; color:rgb(89, 187, 105);"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
