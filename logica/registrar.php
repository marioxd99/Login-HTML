<?php

include("con_db.php");

$nombre = $_POST["usuarioRegistro"];
$email = $_POST["correo"];
$pass = $_POST["passRegistro"];
$pass2 = $_POST["passRepeated"];

if ($pass != $pass2) {
    echo json_encode(array('error'=> true));
} else {
    $contrasenaUser = md5($pass);
    $consulta = "INSERT INTO datosusuario VALUES ('','$nombre','$email','$contrasenaUser','Usuario')";
    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        echo json_encode(array('error'=> true));
    } else {
        echo json_encode(array('error' => false));
    }
}
?>