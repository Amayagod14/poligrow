<?php
include '../controllers/CierreController.php';

$controller = new CierreController();
$dias_retraso = $controller->obtenerDiasRetraso();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cierre</title>
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
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = $controller->crearCierre($_POST);
    if ($resultado) {
        echo '<div class="alert alert-success">Cierre registrado exitosamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al registrar el cierre</div>';
    }
}
?>
    <div class="container mt-5">
        <h2>Registrar Cierre de Quincena</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="quincena">Seleccione Quincena</label>
                <select name="quincena" id="quincena" class="form-control" required>
                    <option value="1">Primera Quincena</option>
                    <option value="2">Segunda Quincena</option>
                </select>
            </div>

            <div class="form-group">
                <label for="apertura_os_hora">Hora de Apertura OS (Viernes)</label>
                <input type="time" name="apertura_os_hora" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cierre_os_hora">Hora de Cierre OS (Lunes)</label>
                <input type="time" name="cierre_os_hora" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha_cierre_sistema">Fecha y hora de Cierre del Sistema</label>
                <input type="datetime-local" name="fecha_cierre_sistema" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="carga_interfaz">Fecha y Hora de Carga de Interfaz</label>
                <input type="datetime-local" name="carga_interfaz" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-primary">Registrar Cierre</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
