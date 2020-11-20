<?php 

	include('../logica/con_db.php');
	$edad=$_POST['edades'];
	$castilla=$_POST['CastillaLaMancha'];
	$albacete=$_POST['Albacete'];
	$ciudadreal=$_POST['CiudadReal'];
	$cuenca=$_POST['Cuenca'];
	$guadalajara=$_POST['Guadalajara'];
	$toledo=$_POST['Toledo'];

	$sql="INSERT into padron (edades,CastillaLaMancha,Albacete,CiudadReal,Cuenca,Guadalajara,Toledo)
								values ('$edad','$castilla','$albacete','$ciudadreal','$cuenca','$guadalajara','$toledo')";
	echo $result=mysqli_query($conex,$sql);

 ?>