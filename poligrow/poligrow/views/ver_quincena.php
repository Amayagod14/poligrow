<?php
include 'header.php';
include '../controllers/ver_quincena_controller.php';
?>
<div class="container mt-5">
    <h2>Detalles de la Quincena</h2>
    <?php if ($ultimoCierre): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quincena: <?php echo $ultimoCierre['quincena']; ?></h5>
                <p class="card-text">Apertura OS: <?php echo $ultimoCierre['apertura_os']; ?></p>
                <p class="card-text">Cierre OS: <?php echo $ultimoCierre['cierre_os']; ?></p>
                <p class="card-text">Fecha de Cierre del Sistema: <?php echo $ultimoCierre['fecha_cierre_sistema']; ?></p>

                <?php if ($dias_retraso > 0): ?>
                    <p class="text-danger">Retraso: <?php echo $dias_retraso; ?> días</p>
                <?php else: ?>
                    <p class="text-success">No hay retraso en la quincena.</p>
                <?php endif; ?>

                <p class="card-text">Faltantes: <?php echo $ultimoCierre['faltantes']; ?></p>
                
                <a href="editar_quincena.php?id=<?php echo $ultimoCierre['id']; ?>" class="btn btn-warning">Editar</a>
            </div>
        </div>

        <!-- Formulario para cerrar la quincena -->
        <form method="POST" class="mt-3">
            <input type="hidden" name="quincena_id" value="<?php echo $ultimoCierre['id']; ?>">
            <button type="submit" name="cerrar_quincena" class="btn btn-primary">Cerrar Quincena</button>
        </form>

    <?php else: ?>
        <div class="alert alert-warning">No hay datos de quincena registrados.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
