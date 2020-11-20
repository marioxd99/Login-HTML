<?php 
	include('../logica/con_db.php');
	$id=$_POST['id'];

	$sql="DELETE from datosusuario where id='$id'";
	echo $result=mysqli_query($conex,$sql);
 ?>