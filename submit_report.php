<?php
// Incluir el archivo de conexión
include 'db.php';
// Instanciar la clase Conectar y establecer la conexión
$conectar = new Conectar();
$conn = $conectar->Conexion();
// Validar datos
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$problem_type = filter_input(INPUT_POST, 'problem_type', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);

if (!$name || !$email || !$problem_type || !$description || !$location) {
    die("Datos inválidos.");
}

// Insertar los datos en la base de datos usando prepared statements
$sql = "INSERT INTO reports (name, email, problem_type, description, location) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
// Ejecutar la sentencia con los parámetros
if ($stmt->execute([$name, $email, $problem_type, $description, $location])) {
    echo "Reporte enviado correctamente.";
} else {
    echo "Error al enviar el reporte.";
}

// Cerrar la conexión
$conectar->cerrarConexion();
?>
