<!-- The Modal -->
<div class="modal fade" id="myModalProductAdd">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Vas a crear un elemento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="alert alert-primary" role="alert">
                <strong>Nuevo</strong> Producto
            </div>
            <br>
            <center>
            <div class="container">

                <form class="form-horizontal" action="{{ url('guardar/producto') }}" method="POST">
                    @csrf
                    <fieldset>
                        <!-- Form Name -->
                        <legend class="tittle-foot">
                            {{-- <h1>Crear Producto</h1> --}}
                        </legend>

                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><label class="control-label" for="nombre" style="text-align: right"><strong>Nombre*</strong></label></p>
                            </div>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombre del producto"
                                    class="form-control input-md" required>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><label class="control-label" for="email"><strong>Referencia*</strong></label></p>
                            </div>
                            <div class="col-md-8">
                                <input id="referencia" name="referencia" type="text" placeholder="Referencia"
                                    class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><label class="control-label" for="precio" style="text-align: right"><strong>Precio*</strong></label></p>
                            </div>
                            <div class="col-md-8">
                                <input id="precio" name="precio" type="number" placeholder="Precio" pattern="[a-zA-Z ]{2,254}"
                                    class="form-control input-md" required>

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><label class="control-label" for="peso" style="text-align: right"><strong>Peso*</strong></label></p>
                            </div>
                            <div class="col-md-8">
                                <input id="peso" name="peso" type="number" placeholder="Peso" pattern="[a-zA-Z ]{2,254}"
                                    class="form-control input-md" required>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="row">
                            <div class="col-md-4">
                                <p><label class="control-label" for="categoria"><strong>Categoria*</strong></label></p>
                            </div>
                            <div class="col-md-8">
                                <select id="categoria" name="categoria" class="form-control">
                                @if(isset($data))
                                    @foreach ($data as $atributo)
                                        <option value="{{$atributo->id}}">{{$atributo->nombre}}</option>
                                    @endforeach
                                @endif
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
                                    class="form-control input-md" required>

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
            {{-- <a href="" class="save" id="save"><i class="fa fa-trash" data-toggle="myModalProductAdd" data-target="#myModalProductAdd" style="font-size:64px; color:red;"></i></a> --}}
            </center>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-info" data-dismiss="modal">No eliminar</button> --}}
        </div>

      </div>
    </div>
  </div>