<?php
    session_start();
    if(isset($_SESSION['usuario'])){
            header('location: home.php');
        }
    
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Login Castilla La Mancha</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="icon" href="img/Escudo.png">
    </head>

    <body>

        <header class="enca">
            <div class="wrapper">
                <div class="logo">
                    Castilla La Mancha
                </div>
            </div>
            <nav>
                <a href="">Inicio</a>
                <a href="">Contacto</a>
            </nav>
        </header>


        <div class="contenedor-form">
            <div class="toggle">
                <span> Crear Cuenta</span>
            </div>
            <div class="formulario">
                <?php
                if($_POST){
                    $name= isset($_POST['user']) ? $_POST['user'] : '';
                    $password= isset($_POST['password']) ? $_POST['password'] : '';
                    $crsf= isset($_POST['csrf']) ? $_POST['csrf'] : '';
                    if(!empty($name) && !empty($password) && !empty($crsf)){
                        if($_SESSION['csrf'] == $crsf){
                            echo "Welcome";
                            unset($_SESSION['csrf']);
                        }else{
                            echo "CRSF ATACK!";
                        }
                    }
                }
                $token = md5(uniqid(rand(),true));
                $_SESSION['csrf'] = $token;
                ?>
                <h2>Iniciar Sesión</h2>
                <form action="" id="formLog">
                    <input type="text" name="user" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Usuario" required>
                    <input type="password" name="contrasena" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" required>
                    <input type="hidden" name="csrf" value="<?php echo $token ?>"/>
                    <input type="submit" id="inicio" class="btninicio" value="Iniciar Sesión">                  
                </form>
                <div class="error">
                    <span > Usuario o Contraseña Incorrecto</span>
                </div>
            </div>

            <div class="formulario">
                <h2>Crea tu Cuenta</h2>
                <form action="" id="formReg">
                    <input type="text" name="usuarioRegistro"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Usuario" required>
                    <input type="email" name="correo" placeholder="Correo Electronico" required>
                    <input type="password" name="passRegistro"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" required>
                    <input type="password" name="passRepeated"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Repita Contraseña" required>
                    <input type="submit" name="registrarse" class="btnregistro" value="Registrarse">
                </form>
                <div class="error">
                    <span > Contraseñas no coinciden</span>
                </div>
                <div class="exito">
                    <span > Usuario registrado con exito</span>
                </div>
            </div>
            <div class="reset-password">
                <a href="#">Olvide mi Contraseña?</a>
            </div>
        </div>


        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/mainLogin.js"></script>
    </body>

    </html>