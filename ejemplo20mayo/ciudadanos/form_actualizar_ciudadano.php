<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Modificar Ciudadano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php 
        $dpi = $_POST['hidden_acta'] ?? null;
        if (!$dpi) {
            echo "<p class='text-danger'>No se recibió el DPI del ciudadano.</p>";
            exit;
        }

        require_once("../basededatos/conexion.php");

        $sql = "SELECT * FROM ciudadanos WHERE dpi = " . intval($dpi);
        $ejecutar = mysqli_query($conexion, $sql);

        if (!$ejecutar || mysqli_num_rows($ejecutar) == 0) {
            echo "<p class='text-danger'>Ciudadano no encontrado.</p>";
            exit;
        }

        $datos = mysqli_fetch_assoc($ejecutar);
    ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Modificar Ciudadano</h1>
        <form action="crud_ciuda.php" method="post">
            <label for="txt_dpi" class="form-label">DPI</label>
            <input type="number" name="txt_dpi" id="txt_dpi" value="<?php echo htmlspecialchars($datos['dpi']); ?>" class="form-control" readonly>

            <label for="txt_apelli" class="form-label">Apellido</label>
            <input type="text" name="txt_apelli" id="txt_apelli" value="<?php echo htmlspecialchars($datos['apellido']); ?>" class="form-control" required>

            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>" class="form-control" required>

            <label for="txt_direccion" class="form-label">Dirección</label>
            <input type="text" name="txt_direccion" id="txt_direccion" value="<?php echo htmlspecialchars($datos['direccion']); ?>" class="form-control">

            <label for="txt_telcasa" class="form-label">Tel. Casa</label>
            <input type="text" name="txt_telcasa" id="txt_telcasa" value="<?php echo htmlspecialchars($datos['tel_casa']); ?>" class="form-control">

            <label for="txt_telmovil" class="form-label">Tel. Móvil</label>
            <input type="text" name="txt_telmovil" id="txt_telmovil" value="<?php echo htmlspecialchars($datos['tel_movil']); ?>" class="form-control">

            <label for="txt_email" class="form-label">Correo Electrónico</label>
            <input type="email" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($datos['email']); ?>" class="form-control">

            <label for="txt_fechanac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="txt_fechanac" id="txt_fechanac" value="<?php echo htmlspecialchars($datos['fechanac']); ?>" class="form-control">

            <label for="txt_nivel" class="form-label">Código Nivel Académico</label>
            <input type="text" name="txt_nivel" id="txt_nivel" value="<?php echo htmlspecialchars($datos['cod_nivel_acad']); ?>" class="form-control">

            <label for="txt_muni" class="form-label">Código Municipio</label>
            <input type="text" name="txt_muni" id="txt_muni" value="<?php echo htmlspecialchars($datos['cod_muni']); ?>" class="form-control">

            <label for="txt_contra" class="form-label">Contraseña</label>
            <input type="text" name="txt_contra" id="txt_contra" value="<?php echo htmlspecialchars($datos['contra']); ?>" class="form-control">

            <br>
            <button type="submit" class="btn btn-primary form-control" name="btn_acta" id="btn_acta">Modificar Ciudadano</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
