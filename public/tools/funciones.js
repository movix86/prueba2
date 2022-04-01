//MODAL PARA ELIMINAR USURIO
function tramite_date(url='', id='', $tramite=''){
    var path_delete = url + id;
    var elemento = document.getElementById('tramite');

    //Cambio de vistas del modal
    var procesos = document.getElementsByClassName("proceso");
    var iconcrear = document.getElementById("crear");
    var iconeliminar = document.getElementById("eliminar");
    var iconvender = document.getElementById("vender");

    if (procesos[0].id == $tramite) {
        alert($tramite);
        iconeliminar.style.display = "none";
        iconvender.style.display = "none";
        iconcrear.style.display = "block";
    }
    if (procesos[1].id == $tramite) {
        iconvender.style.display = "none";
        iconcrear.style.display = "none";
        iconeliminar.style.display = "block";
    }
    if (procesos[2].id == $tramite) {
        iconeliminar.style.display = "none";
        iconcrear.style.display = "none";
        iconvender.style.display = "block";
    }
    
    //alert(url + id);
    elemento.setAttribute('href', path_delete);
}


// //MODAL PARA COMPRAR
// function transaccion_date(url='', id=''){
//     //alert(url + id);
//     var path_delete = url + id;
//     var elemento = document.getElementById('delete');
//     elemento.setAttribute('href', path_delete);
// }
