
<?php
class CierreModel {
    private $conn;  // Conexión a la base de datos

    /**
     * Constructor para inicializar la conexión a la base de datos.
     * @param $db - Conexión a la base de datos (MySQLi)
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Registrar un nuevo cierre de quincena en la base de datos.
     * @param string $quincena - Período de la quincena.
     * @param string $apertura_os - Fecha de apertura de OS.
     * @param string $cierre_os - Fecha de cierre de OS.
     * @param string $fecha_cierre_sistema - Fecha de cierre en el sistema.
     * @param string $carga_interfaz - Fecha de carga en la interfaz.
     * @return bool - Indica si la operación fue exitosa.
     */
    public function registrarCierre($quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $carga_interfaz) {
        $query = "INSERT INTO cierres (quincena, apertura_os, cierre_os, fecha_cierre_sistema, carga_interfaz) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Asignar los parámetros a la consulta
        $stmt->bind_param('sssss', $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $carga_interfaz);

        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }

    /**
     * Editar un cierre de quincena existente.
     * @param int $id - ID del cierre.
     * @param string $quincena - Período de la quincena.
     * @param string $apertura_os - Fecha de apertura de OS.
     * @param string $cierre_os - Fecha de cierre de OS.
     * @param string $fecha_cierre_sistema - Fecha de cierre en el sistema.
     * @param int $faltantes - Número de faltantes en el cierre.
     * @return bool - Indica si la operación fue exitosa.
     */
    public function editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes) {
        $query = "UPDATE cierres 
                  SET quincena = ?, apertura_os = ?, cierre_os = ?, fecha_cierre_sistema = ?, faltantes = ?
                  WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Asignar los parámetros a la consulta
        $stmt->bind_param('ssssii', $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes, $id);
        
        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }

    /**
     * Obtener el último cierre de quincena registrado en la base de datos.
     * @return array|null - Array asociativo con los datos del último cierre o null si no hay cierres.
     */
    public function obtenerUltimoCierre() {
        $query = "SELECT * FROM cierres ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Obtener el resultado como un array asociativo
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * Actualizar la información de cierre de quincena con los días de retraso.
     * @param int $id - ID del cierre.
     * @param int $dias_retraso - Número de días de retraso.
     * @return bool - Indica si la operación fue exitosa.
     */
    public function cerrarQuincena($id, $dias_retraso) {
        $query = "UPDATE cierres SET dias_retraso = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Asignar los parámetros a la consulta
        $stmt->bind_param('ii', $dias_retraso, $id);

        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }
}
?>
