<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Problemas de Agua</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Reporte de Problemas de Agua</h2>
        <form action="submit_report.php" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="problem_type">Tipo de Problema:</label>
                <select class="form-control" id="problem_type" name="problem_type" required>
                    <option value="fuga">Fuga de Agua</option>
                    <option value="baja_presion">Baja Presión</option>
                    <option value="mala_calidad">Mala Calidad del Agua</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Ubicación (Dirección):</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Reporte</button>
        </form>
    </div>
</body>
</html>
