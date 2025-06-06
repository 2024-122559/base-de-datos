<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menú Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animate.css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <span class="navbar-brand mb-0 h1 animate__animated animate__fadeInDown">Base de Datos</span>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <h1 class="mb-4 animate__animated animate__fadeInDown animate__delay-1s">Menú Principal</h1>

        <div class="d-grid gap-3 col-6 mx-auto animate__animated animate__fadeInUp animate__delay-2s">
            <a href="regiones/vistaregiones.php" class="btn btn-outline-primary btn-lg">Regiones</a>
            <a href="municipios/municipios.php" class="btn btn-outline-success btn-lg">Municipios</a>
            <a href="departamentos/departamentos.php" class="btn btn-outline-danger btn-lg">Departamentos</a>
            <a href="nivelacademico/academico.php" class="btn btn-outline-secondary btn-lg">Nivel Academico</a>
            <a href="ciudadanos/ciudadanos.php" class="btn btn-outline-warning btn-lg">Ciudadanos</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
