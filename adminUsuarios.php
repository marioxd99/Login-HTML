<?php
session_start();
$usuario = $_SESSION['usuario']['nombre'];
$idUsuario = $_SESSION['usuario']['id'];
$rolUsuario = $_SESSION['usuario']['rol'];
if ($usuario == null || $usuario == '') {
  header("location: index.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Principal</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="css/adminUsuarios.css">
  <link rel="icon" href="img/Escudo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="alertifyjs/alertify.js"></script>
</head>

<body>
  <!-- ----------Cabecera-------- -->
  <header class="enca">
    <div class="wrapper">
      <div class="logo">
        <a style="color: white;" href="home.php"> Castilla La Mancha</a>
      </div>
    </div>
    <nav>
      <?php
      $usuario = strtoupper($usuario);
      echo "<a style='color:white;font-size: 20px;text-align:center;margin-bottom:0;'>Bienvenido $usuario<sub> <i>$rolUsuario</i></sub></a>";
      ?>
      <button class="btn" data-toggle="modal" data-target="#ventanaModal">
        <a style="color:white;font-size: 20px;">Cambiar Contraseña</a>
      </button>
      <a href="logica/logout.php">Cerrar Sesión</a>
    </nav>
  </header>


  <!--Cambio de Contraseña -->
  <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id="formularioPass">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambio de Contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="">Contraseña Actual</label>
            <input type="password" name="passActual" id="passActual" class="form-control input-sm">
            <label for="">Nueva Contraseña</label>
            <input type="password" name="passNueva" id="passNueva" class="form-control input-sm">
            <label for="">Confirmar nueva Contaseña</label>
            <input type="password" name="passNuevaC" id="passNuevaC" class="form-control input-sm">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="cambiarPasss">
              Cambiar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  include('logica/con_db.php');
  ?>

  <h1 id="tituloDatos">Gestión de Usuarios</h1>
  <!--Tabla Principal -->
  <div class="row p-4">
    <div class="col-sm-12">
      <h1 style="text-align:center;margin-top:90px;margin-bottom:40px;">Gestión de Usuarios</h1>
      <caption>
        <?php
        if ($rolUsuario == 'SuperAdmin') {
        ?>
          <button style="margin-bottom:15px;" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">
            Agregar nuevo &nbsp;
            <em class="fas fa-plus-square"></em>
          </button>
        <?php
        }
        ?>
      </caption>
      <?php
      if ($rolUsuario == 'Usuario') {
      ?>
        <table id="tabla" class="table table-striped table-hover table-condensed table-bordered  mt-2 ">
        <?php
      } else {
        ?>
          <table id="tablax" class="table table-striped table-hover table-condensed table-bordered  mt-2 ">
          <?php
        }
          ?>
          <thead>
            <td style="background:#42552b;color:white;">Nombre</td>
            <td style="background:#42552b;color:white;">Email</td>
            <td style="background:#42552b;color:white;">Rol</td>
            <td style="background:#42552b;color:white;">Editar</td>
            <?php
            if ($rolUsuario == 'SuperAdmin') {
            ?>
              <td style="background:#42552b;color:white;">Eliminar</td>
            <?php
            }
            ?>
          </thead>
          <tbody>
            <?php
            if ($rolUsuario == 'SuperAdmin') {
              $sql = "SELECT id,nombre,email,rol FROM datosusuario";
            } elseif ($rolUsuario == 'Admin') {
              $sql = "SELECT id,nombre,email,rol FROM datosusuario WHERE rol='Usuario' or id='$idUsuario'";
            } else {
              $sql = "SELECT id,nombre,email,rol FROM datosusuario WHERE id='$idUsuario'";
            }
            $result = mysqli_query($conex, $sql);
            while ($ver = mysqli_fetch_row($result)) {
              $datos = $ver[0] . "||" . $ver[1] . "||" . $ver[2] . "||" . $ver[3];
            ?>
              <tr>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
                    <i class="far fa-edit"></i>
                  </button>
                </td>
                <?php
                if ($rolUsuario == 'SuperAdmin') {
                ?>
                  <td>
                    <button class="btn btn-danger"><i class="far fa-times-circle" onclick="preguntarSiNo(<?php echo $ver[0] ?>)"></i></button>
                  </td>
                <?php
                }
                ?>
              </tr>
            <?php
            }
            ?>
          </tbody>
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

  <script src="js/funcionesUsuario.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#guardarnuevo').click(function() {
      nombre = $('#nombreA').val();
      email = $('#emailA').val();
      pass1 = $('#pass1').val();
      agregardatos(nombre, email, pass1);
    });

    $('#cambiarPass').click(function() {
      passActual = $('#passActual').val();
      passNueva = $('#passNueva').val();
      passNuevaC = $('#passNuevaC').val();
      cambiodePass(passActual, passNueva, passNuevaC);
    });

    $('#actualizadatos').click(function() {
      actualizaDatos();
    });

    $('#tablax').DataTable({
      lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, 'All']
      ],
      language: {
        "sSearch": "Buscar:",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
          "copy": "Copiar",
          "colvis": "Visibilidad"
        }
      }
    });

  });
</script>