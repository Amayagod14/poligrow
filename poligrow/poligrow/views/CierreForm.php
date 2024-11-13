<?php
include 'header.php';
include '../controllers/form_controller.php';
?>
    <div class="container mt-5">
        <div class="card p-4 shadow-lg rounded">
            <h2 class="text-center mb-4">Registrar Cierre de Quincena</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="quincena" class="form-label">Seleccione Quincena</label>
                    <select name="quincena" id="quincena" class="form-select" required>
                        <option value="1">Primera Quincena</option>
                        <option value="2">Segunda Quincena</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="apertura_os_hora" class="form-label">Hora de Apertura OS (Viernes)</label>
                    <input type="time" name="apertura_os_hora" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cierre_os_hora" class="form-label">Hora de Cierre OS (Lunes)</label>
                    <input type="time" name="cierre_os_hora" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_cierre_sistema" class="form-label">Fecha y Hora de Cierre del Sistema</label>
                    <input type="datetime-local" name="fecha_cierre_sistema" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="carga_interfaz" class="form-label">Fecha y Hora de Carga de Interfaz</label>
                    <input type="datetime-local" name="carga_interfaz" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar Cierre</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
