<?php
include_once '../controllers/CierreController.php';

$cierreController = new CierreController();

// Obtener el ID de la quincena desde la URL o el formulario
$id = $_GET['id'];
$cierre = $cierreController->obtenerCierrePorId($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cierre de Quincena</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Cierre de Quincena</h2>
        <form method="POST" action="controllers/CierreController.php?action=editar&id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="quincena" class="form-label">Quincena</label>
                <input type="text" class="form-control" id="quincena" name="quincena" value="<?php echo $cierre['quincena']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apertura_os" class="form-label">Hora de Apertura OS</label>
                <input type="time" class="form-control" id="apertura_os" name="apertura_os" value="<?php echo $cierre['apertura_os']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cierre_os" class="form-label">Hora de Cierre OS</label>
                <input type="time" class="form-control" id="cierre_os" name="cierre_os" value="<?php echo $cierre['cierre_os']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_cierre_sistema" class="form-label">Fecha y Hora de Cierre del Sistema</label>
                <input type="datetime-local" class="form-control" id="fecha_cierre_sistema" name="fecha_cierre_sistema" value="<?php echo $cierre['fecha_cierre_sistema']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="faltantes" class="form-label">Faltantes (Razón del Retraso)</label>
                <textarea class="form-control" id="faltantes" name="faltantes" rows="3" required><?php echo $cierre['faltantes']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
