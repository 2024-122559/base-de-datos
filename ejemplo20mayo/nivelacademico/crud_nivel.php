<?php
require_once("../basededatos/conexion.php");

// Insertar nuevo nivel académico
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $nombre = $_POST['txt_nombre'];
    $descripcion = $_POST['txt_nivel']; // <- Asegúrate de que tu input tenga este name

    $sql = "INSERT INTO nivelesacademicos (cod_nivel_acad, nombre, descripcion) 
            VALUES ($codigo, '$nombre', '$descripcion');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: academico.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al insertar los datos:<br>" . $e->getMessage();
    }
}

// Eliminar nivel académico
if (isset($_POST['btn_eli'])) {
    $codigo = $_POST['hidden_eli'];

    $sql = "DELETE FROM nivelesacademicos WHERE cod_nivel_acad = $codigo";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: academico.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al eliminar los datos:<br>" . $e->getMessage();
    }
}

// Modificar nivel académico
if (isset($_POST['btn_acta'])) {
    $codigo = $_POST['txt_codigo'];
    $nombre = $_POST['txt_nombre'];
    $descripcion = $_POST['txt_nivel'];

    $sql = "UPDATE nivelesacademicos 
            SET nombre = '$nombre', 
                descripcion = '$descripcion' 
            WHERE cod_nivel_acad = $codigo;";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: academico.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al modificar los datos:<br>" . $e->getMessage();
    }
}
?>
