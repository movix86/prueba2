
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Oops vas a eliminar este elemento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="alert alert-warning">
                <strong>Cuidado!</strong> Esta seguro de esta acción?
            </div>
            <br>
            <center>
                <td><a href="" class="tramite" id="tramite">
                  <i id="crear" class="fa fa-trash proceso" data-toggle="modal" data-target="#myModal" style="font-size:64px; color:red;"></i>
                  <i id="eliminar" class="fa fa-trash proceso" data-toggle="modal" data-target="#myModal" style="font-size:64px; color:red;"></i>
                  <i id="vender" class="fa fa-money proceso" data-toggle="modal" data-target="#myModal" style="font-size:64px; color:rgb(89, 187, 105);"></i>
                </a></td>
            </center>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">No eliminar</button>
        </div>

      </div>
    </div>
  </div>
