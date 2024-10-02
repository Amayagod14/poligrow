create schema poligrow;
use poligrow;

CREATE TABLE cierres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quincena VARCHAR(255) NOT NULL,
    apertura_os TIME NOT NULL,
    cierre_os TIME NOT NULL,
    fecha_cierre_sistema DATE NOT NULL,
    carga_interfaz DATETIME NOT NULL
);
ALTER TABLE cierres
ADD COLUMN dias_retraso INT DEFAULT 0;

-- Cambiar el campo 'fecha_cierre_sistema' para incluir fecha y hora
ALTER TABLE cierres
MODIFY COLUMN fecha_cierre_sistema DATETIME NOT NULL;


ALTER TABLE cierres
ADD COLUMN faltantes TEXT;

select * from cierres;