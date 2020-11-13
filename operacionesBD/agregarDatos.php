<?php 

	$conex=mysqli_connect("localhost","root","mario","registro");
	$n=$_POST['nombre'];
	$e=$_POST['email'];
	$p=$_POST['pass1'];
	$p=md5($p);

	$sql="INSERT into datosusuario (nombre,email,contraseña)
								values ('$n','$e','$p')";
	echo $result=mysqli_query($conex,$sql);

 ?>