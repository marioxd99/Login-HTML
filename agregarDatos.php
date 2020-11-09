<?php 

	$conex=mysqli_connect("localhost","root","","registro");
	$n=$_POST['nombre'];
	$e=$_POST['email'];

	$sql="INSERT into datosusuario (nombre,email)
								values ('$n','$e')";
	echo $result=mysqli_query($conex,$sql);

 ?>