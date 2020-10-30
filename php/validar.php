<?php
$usuario=$_POST['name'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['name']=$usuario;

$conex=mysqli_connect('localhost','root','','registro');

$consulta="SELECT*FROM datos where usuario='$usuario' and contrasena='$contrasena' ";
$resultado=mysqli_query($conex,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">Error en la autenticación</h1>
    <?php
}
mysqli_close($conex);

?>