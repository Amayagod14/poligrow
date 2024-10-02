<?php
include '../controllers/CierreController.php';

$controller = new CierreController();
$id = $_GET['id'];  // Obtener el ID de la quincena
$cierre = $controller->obtenerUltimoCierre();  // Obtener los detalles del cierre

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario y actualizarlos
    $quincena = $_POST['quincena'];
    $apertura_os = $_POST['apertura_os'];
    $cierre_os = $_POST['cierre_os'];
    $fecha_cierre_sistema = $_POST['fecha_cierre_sistema'];
    $faltantes = $_POST['faltantes'];

    $resultado = $controller->editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes);
    
    if ($resultado) {
        echo '<div class="alert alert-success">Cierre actualizado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el cierre.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Quincena</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Quincena</h2>

        <form method="POST">
            <div class="mb-3">
                <label for="quincena" class="form-label">Quincena</label>
                <input type="text" class="form-control" id="quincena" name="quincena" value="<?php echo $cierre['quincena']; ?>">
            </div>
            <div class="mb-3">
                <label for="apertura_os" class="form-label">Apertura OS</label>
                <input type="text" class="form-control" id="apertura_os" name="apertura_os" value="<?php echo $cierre['apertura_os']; ?>">
            </div>
            <div class="mb-3">
                <label for="cierre_os" class="form-label">Cierre OS</label>
                <input type="text" class="form-control" id="cierre_os" name="cierre_os" value="<?php echo $cierre['cierre_os']; ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_cierre_sistema" class="form-label">Fecha de Cierre del Sistema</label>
                <input type="text" class="form-control" id="fecha_cierre_sistema" name="fecha_cierre_sistema" value="<?php echo $cierre['fecha_cierre_sistema']; ?>">
            </div>
            <div class="mb-3">
                <label for="faltantes" class="form-label">Faltantes</label>
                <input type="number" class="form-control" id="faltantes" name="faltantes" value="<?php echo $cierre['faltantes']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
