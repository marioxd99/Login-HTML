<?php
    session_start();
    error_reporting(0);
    $usuario=$_SESSION['username'];

    if($usuario==null || $usuario==''){
        echo"Usted no tiene acceso";
        header("location: index.html");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="css/paginaPrincipal.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
        <link rel="icon"  href="https://cutt.ly/UgKY2Lh">
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="funciones.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="alertifyjs/alertify.js"></script>
</head>
<body>
<header class="enca">
      <div class="wrapper">
           <div class="logo">
           <a style="color: white;"  href="paginaPrincipal.php"> Castilla La Mancha</a>   
            </div>
      </div>  
      <nav>
       <?php
        $usuario=strtoupper($usuario);
        echo"<a style='color:white;font-size: 20px;'>Bienvenido $usuario</a>";
        ?>
         <a href="adminUsuarios.php">Administrar Usuarios</a>
         <button class="btn" data-toggle="modal" data-target="#ventanaModal">
            <a style="color:white;font-size: 20px;">Cambiar Contraseña</a>
        </button>
        <a href="logica/logout.php">Cerrar Sesión</a>
      </nav>
   </header>


<!--Cambio de Contraseña -->
<div class="modal" id="ventanaModal" tablaindex=-1 role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">  
   <div class="modal-dialog" role="document">  
    <div class="modal-content">
     <form action="logica/cambioContrasena.php" method="post">
      <div class="modal-header">
          <h4 id="tituloVentana">Cambio de Contraseña</h4>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
                  <div class="modal-body"> 
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña Actual:</label>
                        <input type="password" name="passActual" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nueva Contraseña:</label>
                        <input type="password" name="pass1" class="form-control" id="recipient-name">
                      </div>
                       <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nueva Contraseña:</label>
                        <input type="password" name="pass2"class="form-control" id="recipient-name">
                        </div>
                  </div>      
        </div>  
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">         
    </div>
    </form>
   </div>
  </div>
</div>

<?php
   $conex=mysqli_connect("localhost","root","mario","registro");
?>
<!--Tabla Principal -->

<div class="row p-4">
    <div class="col-sm-12">
       <h1 style="text-align:center;margin-top:90px;margin-bottom:40px;">Gestión de Usuarios</h1>
       <caption>
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">
               Agregar nuevo &nbsp;
               <i class="fas fa-plus-square"></i>
               </button>
           </caption>
        <table class="table table-hover table-condensed table-bordered  mt-2 ">          
            <tr>
                <td style="background:#42552b;color:white;">Nombre</td>
                <td style="background:#42552b;color:white;">Email</td>
                <td style="background:#42552b;color:white;">Editar</td>
                <td style="background:#42552b;color:white;">Eliminar</td>
            </tr>
            <?php
                $sql="SELECT id,nombre,email FROM datosusuario";
                $result=mysqli_query($conex,$sql);
                while($ver=mysqli_fetch_row($result)){  
            $datos=$ver[0]."||".$ver[1]."||".$ver[2];
            ?>            
            <tr>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
                        <i class="far fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger"><i class="far fa-times-circle" onclick="preguntarSiNo(<?php echo $ver[0]?>)"></i></button>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>    
    </div>
</div>

<!--Modal para registros nuevos -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Nombre</label>
        <input type="text" name="" id="nombreA" class="form-control input-sm">
        <label for="">Email</label>
        <input type="text" name="" id="emailA" class="form-control input-sm">
        <label for="">Contaseña</label>
        <input type="password" name="" id="pass1" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardarnuevo">
        Agregar
        </button>
      </div>
    </div>
  </div>
</div>


<!--Modal para editar registros -->
<div class="modal fade" id="modalEdicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="text" hidden="" id="idpersona" name="">
       <label for="">Nombre</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm">
        <label for="">Email</label>
        <input type="email" name="" id="emailu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">
        Actualizar
        </button>
      </div>
    </div>
  </div>
 </div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){         
          nombre=$('#nombreA').val();
          email=$('#emailA').val();
          pass1=$('#pass1').val();
          agregardatos(nombre,email,pass1);
        });

        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>