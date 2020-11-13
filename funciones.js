function agregardatos(nombre, email, pass1) {

    cadena = "nombre=" + nombre +
        "&email=" + email + "&pass1=" + pass1;

    $.ajax({
        type: "POST",
        url: "operacionesBD/agregarDatos.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alertify.success("Agregado con exito :)");
            } else {
                alertify.error("Error al Insertar  :(");
            }
        }
    });

}

function agregaform(datos) {

    d = datos.split('||');

    $('#idpersona').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#emailu').val(d[2]);


}

function actualizaDatos() {

    id = $('#idpersona').val();
    nombre = $('#nombreu').val();
    email = $('#emailu').val();

    cadena = "id=" + id + "&nombre=" + nombre +
        "&email=" + email;

    $.ajax({
        type: "POST",
        url: "operacionesBD/actualizaDatos.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alertify.success("Actualizado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function preguntarSiNo(id) {
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        function() { eliminarDatos(id) },
        function() { alertify.error('Se cancelo') });
}

function eliminarDatos(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "operacionesBD/eliminarDatos.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}