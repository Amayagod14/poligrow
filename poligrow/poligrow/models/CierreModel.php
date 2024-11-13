
<?php
class CierreModel {
    private $conn;  // Conexión a la base de datos

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrarCierre($quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $carga_interfaz) {
        $query = "INSERT INTO cierres (quincena, apertura_os, cierre_os, fecha_cierre_sistema, carga_interfaz) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Asignar los parámetros a la consulta
        $stmt->bind_param('sssss', $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $carga_interfaz);

        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }


    public function editarCierre($id, $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes) {
        $query = "UPDATE cierres 
                  SET quincena = ?, apertura_os = ?, cierre_os = ?, fecha_cierre_sistema = ?, faltantes = ?
                  WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssi', $quincena, $apertura_os, $cierre_os, $fecha_cierre_sistema, $faltantes, $id);
        return $stmt->execute();
    }


    public function obtenerUltimoCierre() {
        $query = "SELECT * FROM cierres WHERE estado = 'abierta' ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Obtener el resultado como un array asociativo
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    public function obtenerQuincenaAbiertaAnterior() {
        $query = "SELECT * FROM cierres WHERE estado = 'abierta' ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        return $resultado->fetch_assoc(); // Devolver la quincena abierta si existe
    }

    // Cerrar la quincena actual
    public function cerrarQuincena($id) {
        $query = "UPDATE cierres SET estado = 'cerrada', fecha_cierre_sistema = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        
        return $stmt->execute();
    }
}
?>
