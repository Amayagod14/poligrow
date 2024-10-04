<?php
include_once '../models/CierreModel.php';
include_once '../models/Conexion.php';

class CierreController {
    private $cierreModel;

    public function __construct() {
        $conexion = new Conexion();
        $db = $conexion->obtenerConexion();
        $this->cierreModel = new CierreModel($db);
    }

    // Función para manejar la creación de cierres
    public function crearCierre($data) {
        $quincena = $data['quincena'];
        $apertura_os_hora = $data['apertura_os_hora'];  // Hora de apertura OS
        $cierre_os_hora = $data['cierre_os_hora'];  // Hora de cierre OS
        $fecha_cierre_sistema = $data['fecha_cierre_sistema'];  // Fecha y hora de cierre del sistema
        $carga_interfaz = $data['carga_interfaz'];  // Fecha y hora de carga de la interfaz

        // Registrar cierre a través del modelo
        return $this->cierreModel->registrarCierre($quincena, $apertura_os_hora, $cierre_os_hora, $fecha_cierre_sistema, $carga_interfaz);
    }

    // Función para obtener el último cierre y calcular el retraso en días
    public function obtenerDiasRetraso() {
        $hoy = date('Y-m-d H:i:s');  // Obtener fecha y hora actual
        $dias_retraso = 0;

        $ultimoCierre = $this->cierreModel->obtenerUltimoCierre();  // Obtener el último cierre registrado
        if ($ultimoCierre) {
            $fecha_cierre_sistema = $ultimoCierre['fecha_cierre_sistema'];  // Fecha de cierre del sistema
            if ($hoy > $fecha_cierre_sistema) {
                // Calcular el número de días de retraso
                $datetime1 = new DateTime($fecha_cierre_sistema);
                $datetime2 = new DateTime($hoy);
                $interval = $datetime1->diff($datetime2);
                $dias_retraso = $interval->days;
            }
        }
        return $dias_retraso;
    }

    public function cerrarQuincena($id) {
        return $this->cierreModel->cerrarQuincena($id);
    }

    // Obtener la quincena anterior abierta
    public function obtenerQuincenaAbiertaAnterior() {
        return $this->cierreModel->obtenerQuincenaAbiertaAnterior();
    }

    // Obtener el último cierre completo para mostrar en la vista
    public function obtenerUltimoCierre() {
        return $this->cierreModel->obtenerUltimoCierre();
    }

    // Editar el cierre en la base de datos
    public function editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes) {
        return $this->cierreModel->editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes);
    }

    // Guardar los cambios del cierre editado
    public function guardarCambiosCierre() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validación de datos recibidos por POST
            if (isset($_POST['id'], $_POST['quincena'], $_POST['apertura_os'], $_POST['cierre_os'], $_POST['fecha_cierre_sistema'], $_POST['faltantes'])) {

                // Obtener el ID de la quincena a editar
                $id = $_POST['id'];  // Asegúrate de que en la vista tengas un campo hidden para el ID

                // Obtener los datos del formulario
                $quincena = $_POST['quincena'];
                $apertura_os = $_POST['apertura_os'];
                $cierre_os = $_POST['cierre_os'];
                $fecha_cierre_sistema = $_POST['fecha_cierre_sistema'];
                $faltantes = $_POST['faltantes'];

                // Llamar al modelo para editar el cierre
                $resultado = $this->editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes);

                // Redirigir a la vista `ver_quincena.php` si la edición es exitosa
                if ($resultado) {
                    header('Location: ../views/ver_quincena.php');
                    exit();
                } else {
                    echo '<div class="alert alert-danger">Error al actualizar el cierre</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Faltan datos requeridos para actualizar el cierre</div>';
            }
        }
    }

}

