<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poligrow - Pantalla de Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css"> <!-- Ruta al archivo CSS -->
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="menu.php">Poligrow IT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <header class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Bienvenido a Cierres Poligrow</h1>
            <p class="lead">Tu plataforma para gestionar las quincenas de la empresa de manera eficiente</p>
            <a href="CierreForm.php" class="btn btn-warning btn-lg">Comienza Ahora</a>
        </div>
    </header>

    <main>
        <section class="features py-5">
            <div class="container">
                <h2 class="text-center mb-4">¿Qué Ofrecemos?</h2>
                <div class="row text-center">
                    <div class="col-md-4">
                        <a href="CierreForm.php" class="card mb-4 shadow-sm text-decoration-none text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Registrar Quincena</h5>
                                <p class="card-text">Facilita el registro de quincenas de forma rápida y sencilla.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="ver_quincena.php" class="card mb-4 shadow-sm text-decoration-none text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Ver Quincena</h5>
                                <p class="card-text">Consulta tu última quincena abierta.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="soporte.php" class="card mb-4 shadow-sm text-decoration-none text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Soporte</h5>
                                <p class="card-text">Accede a nuestro soporte para resolver cualquier duda.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center py-4 bg-light">
        <p>&copy; 2024 Poligrow IT. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
