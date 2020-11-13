<?php 

	$conex=mysqli_connect("localhost","root","mario","registro");
	$id=$_POST['id'];
	$edad=$_POST['edades'];
	$castilla=$_POST['castilla'];
	$abacete=$_POST['albacete'];
	$ciudadreal=$_POST['ciudadreal'];
	$cuenca=$_POST['cuenca'];
	$guadalajara=$_POST['guadalajara'];
	$toledo=$_POST['toledo'];

    $sql="UPDATE padron SET edades='$edades',
								CastillaLaMancha='$castilla',Albacete='$albacete',CiudadReal='$ciudadreal',
								Cuenca='$cuenca',Guadalajara='$guadalajara,Toledo='$toledo
				WHERE id='$id'";
	echo $result=mysqli_query($conex,$sql);

 ?>