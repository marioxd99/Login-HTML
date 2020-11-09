
$(document).ready(function(){
    
    $('#inicio').
    $.ajax({
        url: '/logica/loguear.php',
        type: 'POST',
        data: {resultado},
        success: function(){
            console.log(response);
        }
        
    })
});


function agregardatos(nombre,email){

	cadena="nombre=" + nombre + 
			"&email=" + email;

	$.ajax({
		type:"POST",
		url:"agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#emailu').val(d[2]);

	
}

function actualizaDatos(){


	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	email=$('#emailu').val();

	cadena= "id=" + id +
			"&nombre=" + nombre + 
			"&email=" + apellido +

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}