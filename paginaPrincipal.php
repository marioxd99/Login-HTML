<?php
session_start();
error_reporting(0);
$usuario = $_SESSION['username'];

if ($usuario == null || $usuario == '') {
  echo "Usted no tiene acceso";
  header("location: index.html");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Pagina Principal</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="css/paginaPrincipal.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
  <link rel="icon" href="https://cutt.ly/UgKY2Lh">

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="funcionesPadron.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="alertifyjs/alertify.js"></script>

</head>

<body>
  <header class="enca">
    <div class="wrapper">
      <div class="logo">
        <a style="color: white;" href="paginaPrincipal.php"> Castilla La Mancha</a>
      </div>
    </div>
    <nav>
      <?php
      $usuario = strtoupper($usuario);
      echo "<a style='color:white;font-size: 20px;'>Bienvenido $usuario</a>";
      ?>
      <a href="adminUsuarios.php">Administrar Usuarios</a>
      <a href="logica/logout.php">Cerrar Sesión</a>
    </nav>
  </header>


  <h1 id="tituloDatos">Datos de Empadronamiento</h1>

  <?php
  $conex = mysqli_connect("localhost", "root", "mario", "registro");
  ?>

  <!--Tabla Principal -->
  <div class="row p-4">
    <div class="col-sm-12">
      <caption>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">
          Agregar nuevo &nbsp;
          <i class="fas fa-plus-square"></i>
        </button>
      </caption>
      <table class="table table-hover table-condensed table-bordered  mt-2 table-sm">
        <tr>
          <td style="background:#42552b;color:white;">Edades</td>
          <td style="background:#42552b;color:white;">Castilla La Mancha</td>
          <td style="background:#42552b;color:white;">Albacete</td>
          <td style="background:#42552b;color:white;">Ciudad Real</td>
          <td style="background:#42552b;color:white;">Cuenca</td>
          <td style="background:#42552b;color:white;">Guadalajara</td>
          <td style="background:#42552b;color:white;">Toledo</td>
          <td style="background:#42552b;color:white;">Editar</td>
          <td style="background:#42552b;color:white;">Eliminar</td>
        </tr>
        <?php
        $sql = "SELECT id,edades,CastillaLaMancha,Albacete,CiudadReal,Cuenca,Guadalajara,Toledo FROM padron";
        $result = mysqli_query($conex, $sql);
        while ($ver = mysqli_fetch_row($result)) {
          $datos = $ver[0] . "||" . $ver[1] . "||" . $ver[2] . "||" . $ver[3] . "||" . $ver[4] . "||" . $ver[5] . "||" . $ver[6] . "||" . $ver[7];
        ?>
          <tr>
            <td><?php echo $ver[1] ?></td>
            <td><?php echo $ver[2] ?></td>
            <td><?php echo $ver[3] ?></td>
            <td><?php echo $ver[4] ?></td>
            <td><?php echo $ver[5] ?></td>
            <td><?php echo $ver[6] ?></td>
            <td><?php echo $ver[7] ?></td>
            <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
                <i class="far fa-edit"></i>
              </button>
            </td>
            <td>
              <button class="btn btn-danger"><i class="far fa-times-circle" onclick="preguntarSiNo(<?php echo $ver[0] ?>)"></i></button>
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
          <label for="">Edades</label>
          <input type="number" name="" id="edadesA" class="form-control input-sm">
          <label for="">Castilla La Mancha</label>
          <input type="number" name="" id="castillaA" class="form-control input-sm">
          <label for="">Albacete</label>
          <input type="number" name="" id="albaceteA" class="form-control input-sm">
          <label for="">Ciudad Real</label>
          <input type="number" name="" id="ciudadrealA" class="form-control input-sm">
          <label for="">Cuenca</label>
          <input type="number" name="" id="cuencaA" class="form-control input-sm">
          <label for="">Guadalajara</label>
          <input type="number" name="" id="guadalajaraA" class="form-control input-sm">
          <label for="">Toledo</label>
          <input type="number" name="" id="toledoA" class="form-control input-sm">
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
          <label for="">Edades</label>
          <input type="text" name="" id="edadesu" class="form-control input-sm">
          <label for="">Castilla La Mancha</label>
          <input type="number" name="" id="castillau" class="form-control input-sm">
          <label for="">Albacete</label>
          <input type="number" name="" id="albaceteu" class="form-control input-sm">
          <label for="">Ciudad Real</label>
          <input type="number" name="" id="ciudadrealu" class="form-control input-sm">
          <label for="">Cuenca</label>
          <input type="number" name="" id="cuencau" class="form-control input-sm">
          <label for="">Guadalajara</label>
          <input type="number" name="" id="guadalajarau" class="form-control input-sm">
          <label for="">Toledo</label>
          <input type="number" name="" id="toledou" class="form-control input-sm">
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
  $(document).ready(function() {
    $('#guardarnuevo').click(function() {
      edades = $('#edadesA').val();
      castilla = $('#castillaA').val();
      albacete = $('#albaceteA').val();
      ciudadreal = $('#ciudadrealA').val();
      cuenca = $('#cuencaA').val();
      guadalajara = $('#guadalajaraA').val();
      toledo = $('#toledoA').val();
      agregardatos(edades, castilla, albacete, ciudadreal, cuenca, guadalajara, toledo);
    });

    $('#actualizadatos').click(function() {
      actualizaDatos();
    });

  });
</script>