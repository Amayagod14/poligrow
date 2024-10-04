<?php
include 'CierreController.php';

$controller = new CierreController();
$dias_retraso = $controller->obtenerDiasRetraso();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = $controller->crearCierre($_POST);
    if ($resultado) {
        echo '<div class="alert alert-success">Cierre registrado exitosamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al registrar el cierre</div>';
    }
}
?>