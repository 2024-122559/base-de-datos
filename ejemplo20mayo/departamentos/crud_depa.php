<?php
require_once("../basededatos/conexion.php");

// Proceso de modificar
if (isset($_POST['btn_acta'])) {
    $codigo = $_POST['txt_codigo'];
    $depa = $_POST['txt_depto'];
    $cod_regi = $_POST['txt_cod_region'];

    $sql = "UPDATE departamentos 
            SET nombre_depto = '$depa', 
                cod_region = '$cod_regi' 
            WHERE cod_depto = $codigo;";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al modificar los datos:<br>" . $e->getMessage();
    }
}

// Proceso de eliminar
if (isset($_POST['btn_eli'])) {
    $codigo = $_POST['hidden_eli'];

    $sql = "DELETE FROM departamentos WHERE cod_depto = $codigo";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al eliminar los datos:<br>" . $e->getMessage();
    }
}

// Proceso de insertar
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $depa = $_POST['txt_depto'];
    $cod_regi = $_POST['txt_cod_region'];

    $sql = "INSERT INTO departamentos (cod_depto, nombre_depto, cod_region) 
            VALUES ($codigo, '$depa', '$cod_regi');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al insertar los datos:<br>" . $e->getMessage();
    }
}
?>
