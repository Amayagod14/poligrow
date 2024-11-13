<?php
include 'CierreController.php';

$controller = new CierreController();
$ultimoCierre = $controller->obtenerUltimoCierre(); // Verificamos si se obtiene un cierre
$dias_retraso = $controller->obtenerDiasRetraso();

// Verificar si se ha enviado el formulario para cerrar la quincena
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cerrar_quincena'])) {
    $quincenaId = $_POST['quincena_id']; // Obtener el ID de la quincena desde el formulario
    $resultado = $controller->cerrarQuincena($quincenaId); // Llamar a la función del controlador para cerrar la quincena

    // Mostrar un mensaje de éxito o error
    if ($resultado) {
        echo '<div class="alert alert-success">Quincena cerrada correctamente</div>';
        // Redirige a ver_quincena.php después de 2 segundos
        header("refresh:2;url=ver_quincena.php");
        exit; // Asegúrate de salir para evitar que el script continúe ejecutándose
    } else {
        echo '<div class="alert alert-danger">Hubo un error al cerrar la quincena</div>';
    }
}
?>