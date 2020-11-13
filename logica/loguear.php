<link rel="stylesheet" href="../css/estilos.css">
<?php

include('con_db.php');
session_start();

$usuario = $_POST['user'];
$clave = $_POST['contrasena'];
$clavemd5 = md5($clave);

$q = "SELECT COUNT(*) as contar FROM datosusuario WHERE nombre='$usuario' and contraseña='$clavemd5'";
$consulta = mysqli_query($conex, $q);
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {
    $_SESSION['username'] = $usuario;
    header("location: ../paginaPrincipal.php");
} else {
?>
<?php
    $_SESSION['username'] = $usuario;
    header("location: ../index.html");
}

?>