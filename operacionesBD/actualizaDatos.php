<?php 

	include('../logica/con_db.php');
    $id=$_POST['id'];
	$n=$_POST['nombre'];
	$e=$_POST['email'];

    $sql="UPDATE datosusuario SET nombre='$n',
								email='$e'
				WHERE id='$id'";
	echo $result=mysqli_query($conex,$sql);

 ?>