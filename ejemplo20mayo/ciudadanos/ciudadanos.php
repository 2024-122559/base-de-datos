<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listado de Ciudadanos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-light">

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM ciudadanos";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container mt-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeInDown">Listado De Ciudadanos</h2>

    <!-- Botón para regresar -->
    <div class="text-start mt-4">
      <a href="../index.php" class="btn btn-primary animate__animated animate__fadeInLeft animate__slow">Regresar</a>
    </div>

    <!-- Botón que lanza el modal -->
    <div class="d-flex justify-content-center my-4">
      <button
        type="button"
        class="btn btn-success gap-2 animate__animated animate__pulse animate__infinite"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      >
        Agregar ciudadanos
      </button>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Encabezado del modal -->
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Ciudadano</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Cerrar"
            ></button>
          </div>

          <!-- Cuerpo del modal -->
          <div class="modal-body">
            <form action="crud_ciuda.php" method="post">
              <label for="txt_dpi" class="form-label">DPI</label>
              <input type="number" name="txt_dpi" id="txt_dpi" class="form-control" required />

              <label for="txt_apelli" class="form-label">Apellido</label>
              <input type="text" name="txt_apelli" id="txt_apelli" class="form-control" required />

              <label for="txt_nombre" class="form-label">Nombre</label>
              <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required />

              <label for="txt_direccion" class="form-label">Dirección</label>
              <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required />

              <label for="txt_telcasa" class="form-label">Tel. Casa</label>
              <input type="text" name="txt_telcasa" id="txt_telcasa" class="form-control" />

              <label for="txt_telmovil" class="form-label">Tel. Móvil</label>
              <input type="text" name="txt_telmovil" id="txt_telmovil" class="form-control" />

              <label for="txt_email" class="form-label">Correo Electrónico</label>
              <input type="email" name="txt_email" id="txt_email" class="form-control" required />

              <label for="txt_fechanac" class="form-label">Fecha de Nacimiento</label>
              <input type="date" name="txt_fechanac" id="txt_fechanac" class="form-control" required />

              <label for="txt_nivel" class="form-label">Código Nivel Académico</label>
              <input type="text" name="txt_nivel" id="txt_nivel" class="form-control" required />

              <label for="txt_muni" class="form-label">Código Municipio</label>
              <input type="text" name="txt_muni" id="txt_muni" class="form-control" required />

              <label for="txt_contra" class="form-label">Contraseña</label>
              <input type="text" name="txt_contra" id="txt_contra" class="form-control" required />

              <br />
              <button
                type="submit"
                class="form-control btn btn-success"
                name="btn_insertar"
                id="btn_insertar"
              >
                Agregar Ciudadano
              </button>
            </form>
          </div>

          <!-- Pie del modal -->
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-danger"
              data-bs-dismiss="modal"
            >
              Cerrar
            </button>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <div class="table-responsive">
      <table class="table table-bordered table-danger text-center align-middle fs-6 w-100">
        <thead class="table-dark">
          <tr>
            <th>DPI</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Tel. Casa</th>
            <th>Tel. Móvil</th>
            <th>Email</th>
            <th>Fecha Nac.</th>
            <th>Nivel Académico</th>
            <th>Municipio</th>
            <th>Contraseña</th>
            <th style="min-width: 120px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $delay = 0;
            while ($fila = mysqli_fetch_assoc($ejecutar)) { 
              $delay += 1;
          ?>
            <tr class="animate__animated animate__fadeInUp" style="animation-delay: <?php echo $delay * 0.1; ?>s;">
              <td><?php echo htmlspecialchars($fila['dpi']); ?></td>
              <td><?php echo htmlspecialchars($fila['apellido']); ?></td>
              <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
              <td><?php echo htmlspecialchars($fila['direccion']); ?></td>
              <td><?php echo htmlspecialchars($fila['tel_casa']); ?></td>
              <td><?php echo htmlspecialchars($fila['tel_movil']); ?></td>
              <td><?php echo htmlspecialchars($fila['email']); ?></td>
              <td><?php echo htmlspecialchars($fila['fechanac']); ?></td>
              <td><?php echo htmlspecialchars($fila['cod_nivel_acad']); ?></td>
              <td><?php echo htmlspecialchars($fila['cod_muni']); ?></td>
              <td><?php echo htmlspecialchars($fila['contra']); ?></td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <form action="crud_ciuda.php" method="post" class="m-0 p-0">
                    <input
                      type="hidden"
                      name="hidden_eli"
                      value="<?php echo htmlspecialchars($fila['dpi']); ?>"
                    />
                    <button
                      type="submit"
                      name="btn_eli"
                      class="btn btn-outline-danger btn-sm animate__animated animate__heartBeat animate__slow"
                      title="Eliminar"
                    >
                      <i class="bi bi-trash3-fill"></i>
                    </button>
                  </form>

                  <form action="form_actualizar_ciudadano.php" method="post" class="m-0 p-0">
                    <input
                      type="hidden"
                      name="hidden_acta"
                      value="<?php echo htmlspecialchars($fila['dpi']); ?>"
                    />
                    <button
                      type="submit"
                      name="btn_act"
                      class="btn btn-outline-success btn-sm animate__animated animate__heartBeat animate__slow"
                      title="Editar"
                    >
                      <i class="bi bi-pencil-square"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
