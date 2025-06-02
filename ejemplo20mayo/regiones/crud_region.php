<?php 
require_once("../basededatos/conexion.php");

//  Proceso de modificar
if (isset($_POST['btn_modificar'])) {
    $codigo = $_POST['txt_codigo']; 
    $nombre = $_POST['txt_nombre']; 
    $desc = $_POST['text_desc'];

    $sql = "UPDATE regiones 
            SET nombre = '$nombre', 
                descripcion = '$desc' 
            WHERE cod_region = $codigo;";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: vistaregiones.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al modificar los datos:<br>" . $e->getMessage();
    }
}

//  Proceso de eliminar
if (isset($_POST['btn_eliminar'])) {
    $codigo = $_POST['hidden_codigo'];

    $sql = "DELETE FROM regiones WHERE cod_region = $codigo";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: vistaregiones.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al eliminar los datos:<br>" . $e->getMessage();        
    } 
}

//  Proceso de insertar
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $nombre = $_POST['txt_nombre'];
    $desc   = $_POST['txt_desc']; // <- Asegúrate de que el input en el HTML tenga `name="txt_desc"`

    $sql = "INSERT INTO regiones (cod_region, nombre, descripcion) 
            VALUES ($codigo, '$nombre', '$desc');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: vistaregiones.php');
        exit;
    } catch (Exception $e) {
        echo "<br>Error al insertar los datos:<br>" . $e->getMessage();        
    } 
}
?>
