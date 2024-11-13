<?php
include 'CierreController.php';

$controller = new CierreController();
$id = $_GET['id'];  // ID del cierre a editar
$ultimoCierre = $controller->obtenerUltimoCierre();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quincena = $_POST['quincena'];
    $apertura_os = $_POST['apertura_os'];
    $cierre_os = $_POST['cierre_os'];
    $fecha_cierre_sistema = $_POST['fecha_cierre_sistema'];
    $faltantes = $_POST['faltantes'];

    $resultado = $controller->editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes);
    if ($resultado) {
        echo '<div class="alert alert-success">Cierre actualizado correctamente</div>';
        // Redirige a ver_quincena.php después de 2 segundos
        header("refresh:0;url=ver_quincena.php");
        exit; // Asegúrate de salir para evitar que el script continúe ejecutándose
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el cierre</div>';
    }
}
?>