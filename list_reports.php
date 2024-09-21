<?php
// Incluir el archivo de conexión
include 'db.php';

// Crear una instancia de la clase Conectar y obtener la conexión
$conectar = new Conectar();
$conn = $conectar->Conexion();

// Consulta SQL
$sql = "SELECT * FROM reports";

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);
$stmt->execute();

// Verificar si la consulta falló
if ($stmt === false) {
    die("Error al ejecutar la consulta: " . implode(" ", $conn->errorInfo()));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reportes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Reportes de Problemas de Agua</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo de Problema</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Fecha del Reporte</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los reportes
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['problem_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                    echo "<td>" . $row['report_date'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conectar->cerrarConexion();
?>
