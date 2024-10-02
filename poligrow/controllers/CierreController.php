
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

    // Función para cerrar la quincena
    public function cerrarQuincena() {
        $ultimoCierre = $this->cierreModel->obtenerUltimoCierre();
        if ($ultimoCierre) {
            $dias_retraso = $this->obtenerDiasRetraso();  // Obtener días de retraso
            // Cerrar la quincena y guardar los días de retraso
            return $this->cierreModel->cerrarQuincena($ultimoCierre['id'], $dias_retraso);
        }
        return false;
    }

    // Obtener el último cierre completo para mostrar en la vista
    public function obtenerUltimoCierre() {
        return $this->cierreModel->obtenerUltimoCierre();
    }

    public function editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes) {
        $query = "UPDATE cierres 
                SET quincena = ?, apertura_os = ?, cierre_os = ?, fecha_cierre_sistema = ?, faltantes = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Vincular parámetros
        $stmt->bind_param('sssssi', $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes, $id);
        
        // Ejecutar y devolver el resultado
        return $stmt->execute();
    }

}
