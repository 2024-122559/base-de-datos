<?php
require_once("../basededatos/conexion.php");

// Insertar ciudadano
if (isset($_POST['btn_insertar'])) {
    $dpi       = intval($_POST['txt_dpi']);
    $apellido  = $_POST['txt_apelli'];
    $nombre    = $_POST['txt_nombre'];
    $direccion = $_POST['txt_direccion'];
    $tel_casa  = $_POST['txt_telcasa'];
    $tel_movil = $_POST['txt_telmovil'];
    $email     = $_POST['txt_email'];
    $fechanac  = $_POST['txt_fechanac'];
    $cod_nivel = $_POST['txt_nivel'];
    $cod_muni  = $_POST['txt_muni'];
    $contra    = $_POST['txt_contra'];

    $sql = "INSERT INTO ciudadanos (
                dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni, contra
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param(
            "issssssssis", 
            $dpi, $apellido, $nombre, $direccion, $tel_casa, $tel_movil, $email, $fechanac, $cod_nivel, $cod_muni, $contra
        );
        $stmt->execute();
        $stmt->close();

        header('Location: ciudadanos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al insertar los datos:<br>" . $e->getMessage();
    }
}

// Eliminar ciudadano
if (isset($_POST['btn_eliminar'])) {
    $dpi = intval($_POST['hidden_dpi']);

    $sql = "DELETE FROM ciudadanos WHERE dpi = ?";

    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $dpi);
        $stmt->execute();
        $stmt->close();

        header('Location: ciudadanos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al eliminar los datos:<br>" . $e->getMessage();
    }
}

// Modificar ciudadano
if (isset($_POST['btn_modificar'])) {
    $dpi       = intval($_POST['txt_dpi']);
    $apellido  = $_POST['txt_apelli'];
    $nombre    = $_POST['txt_nombre'];
    $direccion = $_POST['txt_direccion'];
    $tel_casa  = $_POST['txt_telcasa'];
    $tel_movil = $_POST['txt_telmovil'];
    $email     = $_POST['txt_email'];
    $fechanac  = $_POST['txt_fechanac'];
    $cod_nivel = $_POST['txt_nivel'];
    $cod_muni  = $_POST['txt_muni'];
    $contra    = $_POST['txt_contra'];

    $sql = "UPDATE ciudadanos SET
                apellido = ?,
                nombre = ?,
                direccion = ?,
                tel_casa = ?,
                tel_movil = ?,
                email = ?,
                fechanac = ?,
                cod_nivel_acad = ?,
                cod_muni = ?,
                contra = ?
            WHERE dpi = ?";

    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param(
            "ssssssssssi",
            $apellido, $nombre, $direccion, $tel_casa, $tel_movil, $email, $fechanac, $cod_nivel, $cod_muni, $contra, $dpi
        );
        $stmt->execute();
        $stmt->close();

        header('Location: ciudadanos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al modificar los datos:<br>" . $e->getMessage();
    }
}
?>
