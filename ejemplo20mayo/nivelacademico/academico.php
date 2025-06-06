<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Listado de Niveles Académicos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-light">

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM nivelesacademicos";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container mt-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeInDown">Listado De Niveles Académicos</h2>

    <!-- Botón para regresar -->
    <div class="text-start mt-4">
      <a href="../index.php" class="btn btn-primary animate__animated animate__fadeInLeft animate__slow">Regresar</a>
    </div>

    <!-- Botón que lanza el modal -->
    <div class="d-flex justify-content-center my-4">
      <button type="button" class="btn btn-success gap-2 animate__animated animate__pulse animate__infinite" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Niveles
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Nivel</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form action="crud_nivel.php" method="post">
              <label for="txt_codigo" class="form-label">Codigo</label>
              <input type="number" name="txt_codigo" id="txt_codigo" class="form-control" required />
              <label for="txt_nombre" class="form-label">Nombre</label>
              <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required />
              <label for="txt_nivel" class="form-label">Descripcion</label>
              <input type="text" name="txt_nivel" id="txt_nivel" class="form-control" required />
              <br />
              <button type="submit" class="form-control btn btn-success" name="btn_insertar" id="btn_insertar">
                Agregar Nivel
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-bordered table-danger text-center w-75 mx-auto fs-5">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Nivel</th>
          <th>Descripcion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $delay = 0;
          while ($datos = mysqli_fetch_assoc($ejecutar)) { 
            $delay += 1;
        ?>
          <tr class="animate__animated animate__fadeInUp" style="animation-delay: <?php echo $delay * 0.1; ?>s;">
            <td><?php echo htmlspecialchars($datos['cod_nivel_acad']); ?></td>
            <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
            <td><?php echo htmlspecialchars($datos['descripcion']); ?></td>
            <td class="d-flex justify-content-center gap-2">
              <form action="crud_nivel.php" method="post">
                <input type="hidden" name="hidden_eli" value="<?php echo htmlspecialchars($datos['cod_nivel_acad']); ?>" />
                <button type="submit" name="btn_eli" class="btn btn-outline-danger animate__animated animate__heartBeat animate__slow">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              <form action="form_acd_nivel.php" method="post">
                <input type="hidden" name="hidden_acta" value="<?php echo htmlspecialchars($datos['cod_nivel_acad']); ?>" />
                <button type="submit" name="btn_act" class="btn btn-outline-success animate__animated animate__heartBeat animate__slow">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
