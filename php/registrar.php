<?php

include("con_db.php");

$nombre = $_POST["usuarioRegistro"];
$email=$_POST["correo"];
$pass = $_POST["passRegistro"];
$pass2=$_POST["passRepeated"];
if($pass!=$pass2){
    ?>
   <?php
    include("index.html");
    ?>
    <h1 class="bad">No coinciden las contraseñas</h1>
    <?php
}else{
$contrasenaUser = md5($pass);
$consulta="INSERT INTO datosusuario VALUES ('','$nombre','$email','$contrasenaUser')";
$resultado=mysqli_query($conex,$consulta);
    if(!$resultado){
            ?>
            <h3 class="bad">Ha ocurrido un error</h3>
            <?php
    }else{
            ?>
            <h3 class="ok">¡Usuario registrado Correctamente!</h3>
            <?php
    }
}   
?>