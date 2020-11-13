<?php 

	$conex=mysqli_connect("localhost","root","mario","registro");
	$edad=$_POST['edades'];
	$castilla=$_POST['castilla'];
	$abacete=$_POST['albacete'];
	$ciudadreal=$_POST['ciudadreal'];
	$cuenca=$_POST['cuenca'];
	$guadalajara=$_POST['guadalajara'];
	$toledo=$_POST['toledo'];

	$sql="INSERT into padron (edades,CastillaLaMancha,Albacete,CiudadReal,Cuenca,Guadalajara,Toledo)
								values ('$edad','$castilla','$albacete','$ciudadreal','$cuenca','$guadalajara','$toledo')";
	echo $result=mysqli_query($conex,$sql);

 ?>