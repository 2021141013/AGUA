<?php
// Mostrar errores de PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Conectar {
    protected $db;

    public function Conexion() {
    
        // Configuración de los parámetros de la conexión
        $servername = "HENRI"; // o el nombre de tu servidor
        $username = 'sa'; // Reemplazar si 'getenv' no está configurado
        $password = 'sa'; // Reemplazar si 'getenv' no está configurado
        $dbname = "muni"; // Cambiar si fuera necesario

        try {
            // Intentar la conexión a la base de datos usando PDO
            $this->db = new PDO("sqlsrv:server=$servername;database=$dbname", $username, $password);
            // Configurar PDO para que lance excepciones en caso de error
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Comentario de verificación: Si la conexión es exitosa, mostrar mensaje
            echo "Conexión exitosa con la base de datos."; 

            // Devolver la instancia de conexión de base de datos
            return $this->db;

        } catch (PDOException $e) {
            // Comentario de manejo de error: Si la conexión falla, mostrar mensaje de error
            echo "Error de conexión: " . $e->getMessage();
            die(); // Terminar el script en caso de fallo en la conexión
        }
    }

    public function cerrarConexion() {
        $this->db = null;
    }
}

// Instancia para probar la conexión
$conectar = new Conectar();
$conectar->Conexion();
?>
