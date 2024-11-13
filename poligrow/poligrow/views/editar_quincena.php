<?php
include 'header.php';
include_once '../controllers/editar_controller.php';
?>
<div class="container mt-5">
    <h2>Editar Quincena</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="quincena" class="form-label">Quincena</label>
            <input type="text" name="quincena" class="form-control" value="<?php echo $ultimoCierre['quincena']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="apertura_os" class="form-label">Apertura OS</label>
            <input type="text" name="apertura_os" class="form-control" value="<?php echo $ultimoCierre['apertura_os']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="cierre_os" class="form-label">Cierre OS</label>
            <input type="text" name="cierre_os" class="form-control" value="<?php echo $ultimoCierre['cierre_os']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="fecha_cierre_sistema" class="form-label">Fecha Cierre Sistema</label>
            <input type="date" name="fecha_cierre_sistema" class="form-control" value="<?php echo $ultimoCierre['fecha_cierre_sistema']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="faltantes" class="form-label">Faltantes</label>
            <input type="text" name="faltantes" class="form-control" value="<?php echo $ultimoCierre['faltantes']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
