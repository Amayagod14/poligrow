<?php
include '../controllers/CierreController.php';

$controller = new CierreController();
$ultimoCierre = $controller->obtenerUltimoCierre();  // Usamos el método público
$dias_retraso = $controller->obtenerDiasRetraso();

if (isset($_POST['cerrar_quincena'])) {
    $resultado = $controller->cerrarQuincena();
    if ($resultado) {
        echo '<div class="alert alert-success">Quincena cerrada exitosamente con ' . $dias_retraso . ' días de retraso</div>';
    } else {
        echo '<div class="alert alert-danger">Error al cerrar la quincena</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Quincena</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="menu.php">Poligrow IT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="CierreForm.php">Registrar Quincena</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_quincena.php">Ver Quincena</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="soporte.php">Soporte</a>  
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-5">
    <h2>Detalles de la Quincena</h2>

    <?php if ($ultimoCierre): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quincena: <?php echo $ultimoCierre['quincena']; ?></h5>
                <p class="card-text">Apertura OS: <?php echo $ultimoCierre['apertura_os']; ?></p>
                <p class="card-text">Cierre OS: <?php echo $ultimoCierre['cierre_os']; ?></p>
                <p class="card-text">Fecha de Cierre del Sistema: <?php echo $ultimoCierre['fecha_cierre_sistema']; ?></p>
                <p class="card-text">Carga de Interfaz: <?php echo $ultimoCierre['carga_interfaz']; ?></p>

                <?php if ($dias_retraso > 0): ?>
                    <p class="text-danger">Retraso: <?php echo $dias_retraso; ?> días</p>
                <?php else: ?>
                    <p class="text-success">No hay retraso en la quincena.</p>
                <?php endif; ?>
                
                <!-- Botón de Editar -->
                <a href="editar_quincena.php?id=<?php echo $ultimoCierre['id']; ?>" class="btn btn-warning">Editar</a>
            </div>
        </div>

        <form method="POST" class="mt-3">
            <button type="submit" name="cerrar_quincena" class="btn btn-primary">Cerrar Quincena</button>
        </form>

    <?php else: ?>
        <div class="alert alert-warning">No hay datos de quincena registrados.</div>
    <?php endif; ?>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
