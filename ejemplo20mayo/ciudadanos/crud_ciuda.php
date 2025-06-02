<?php
require_once("../basededatos/conexion.php");

// Agregar nuevo ciudadano
if (isset($_POST['btn_insertar'])) {
    // Obtener y sanitizar datos del formulario
    $dpi       = intval($_POST['txt_dpi']);
    $apellido  = mysqli_real_escape_string($conexion, $_POST['txt_apelli']);
    $nombre    = mysqli_real_escape_string($conexion, $_POST['txt_nombre']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['txt_direccion']);
    $tel_casa  = mysqli_real_escape_string($conexion, $_POST['txt_telcasa']);
    $tel_movil = mysqli_real_escape_string($conexion, $_POST['txt_telmovil']);
    $email     = mysqli_real_escape_string($conexion, $_POST['txt_email']);
    $fechanac  = mysqli_real_escape_string($conexion, $_POST['txt_fechanac']);
    $cod_nivel = mysqli_real_escape_string($conexion, $_POST['txt_nivel']);
    $cod_muni  = mysqli_real_escape_string($conexion, $_POST['txt_muni']);
    $contra    = mysqli_real_escape_string($conexion, $_POST['txt_contra']);

    // Construir la consulta SQL
    $sql = "INSERT INTO ciudadanos (
                dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni, contra
            ) VALUES (
                $dpi, '$apellido', '$nombre', '$direccion', '$tel_casa', '$tel_movil', '$email', '$fechanac', '$cod_nivel', '$cod_muni', '$contra'
            )";

    // Ejecutar consulta e informar resultado
    if (mysqli_query($conexion, $sql)) {
        // Redireccionar o mostrar mensaje
        header('Location: ciudadanos.php');  // Cambia 'tu_archivo_actual.php' por la página que quieras
        exit;
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
}

// Eliminar ciudadano
if (isset($_POST['btn_eli'])) {
    $dpi = intval($_POST['hidden_eli']);  // El identificador es dpi

    $sql = "DELETE FROM ciudadanos WHERE dpi = $dpi";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        // Puedes mostrar mensaje o redirigir
        header('Location: ciudadanos.php'); // Cambia por tu página de listado
        exit;
    } catch (Exception $th) {
        echo "<br>Error al eliminar datos: " . $th->getMessage();
    }
}

// Modificar ciudadano
if (isset($_POST['btn_acta'])) {
    $dpi       = intval($_POST['txt_dpi']);
    $apellido  = mysqli_real_escape_string($conexion, $_POST['txt_apelli']);
    $nombre    = mysqli_real_escape_string($conexion, $_POST['txt_nombre']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['txt_direccion']);
    $tel_casa  = mysqli_real_escape_string($conexion, $_POST['txt_telcasa']);
    $tel_movil = mysqli_real_escape_string($conexion, $_POST['txt_telmovil']);
    $email     = mysqli_real_escape_string($conexion, $_POST['txt_email']);
    $fechanac  = mysqli_real_escape_string($conexion, $_POST['txt_fechanac']);
    $cod_nivel = mysqli_real_escape_string($conexion, $_POST['txt_nivel']);
    $cod_muni  = mysqli_real_escape_string($conexion, $_POST['txt_muni']);
    $contra    = mysqli_real_escape_string($conexion, $_POST['txt_contra']);

    $sql = "UPDATE ciudadanos SET
                apellido = '$apellido',
                nombre = '$nombre',
                direccion = '$direccion',
                tel_casa = '$tel_casa',
                tel_movil = '$tel_movil',
                email = '$email',
                fechanac = '$fechanac',
                cod_nivel_acad = '$cod_nivel',
                cod_muni = '$cod_muni',
                contra = '$contra'
            WHERE dpi = $dpi";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        // Puedes mostrar mensaje o redirigir
        header('Location: ciudadanos.php'); // Cambia por tu página de listado
        exit;
    } catch (Exception $th) {
        echo "<br>Error al actualizar datos: " . $th->getMessage();
    }
}


?>