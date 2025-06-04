<?php
require_once("../basededatos/conexion.php");

// Insertar nuevo municipio
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $muni = $_POST['txt_muni'];
    $cod_depa = $_POST['text_cod_depa']; // Asegúrate de que este sea el mismo "name" en el formulario

    $sql = "INSERT INTO municipios (cod_muni, nombre_municipio, cod_depto) 
            VALUES ($codigo, '$muni', '$cod_depa');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: municipios.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al insertar los datos:<br>" . $e->getMessage();
    }
}

// Eliminar municipio
if (isset($_POST['btn_eli'])) {
    $codigo = $_POST['hidden_eli'];

    $sql = "DELETE FROM municipios WHERE cod_muni = $codigo";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: municipios.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al eliminar los datos:<br>" . $e->getMessage();
    }
}

// Modificar municipio
if (isset($_POST['btn_acta'])) {
    $codigo = $_POST['txt_codigo'];
    $muni = $_POST['txt_muni'];
    $cod_depa = $_POST['text_cod_depa'];

    $sql = "UPDATE municipios 
            SET nombre_municipio = '$muni', 
                cod_depto = '$cod_depa' 
            WHERE cod_muni = $codigo;";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: municipios.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al modificar los datos:<br>" . $e->getMessage();
    }
}
?>
