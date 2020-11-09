<?php 

	$conex=mysqli_connect("localhost","root","mario","registro");
    $id=$_POST['id'];
	$n=$_POST['nombre'];
	$e=$_POST['email'];

    $sql="UPDATE datosusuario set nombre='$n',
								email='$e',
				where id='$id'";
	echo $result=mysqli_query($conex,$sql);

 ?>