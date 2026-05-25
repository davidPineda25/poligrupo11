<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$sql = "INSERT INTO estudiantes(nombre, correo) VALUES('$nombre', '$correo')";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Estudiante</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .mensaje {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            min-width: 300px;
        }
        
        .exito {
            color: #28a745;
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .error {
            color: #dc3545;
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        h3 {
            margin: 10px 0;
            color: #333;
        }
        
        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }
        
        .btn-volver:hover {
            background: #5a67d8;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="mensaje">
        <?php if ($resultado): ?>
            <div class="exito">✓</div>
            <h3>¡Guardado correctamente!</h3>
        <?php else: ?>
            <div class="error">✗</div>
            <h3>Error al guardar</h3>
            <p style="color: #dc3545; font-size: 14px;"><?php echo mysqli_error($conexion); ?></p>
        <?php endif; ?>
        <a href="index.php" class="btn-volver">← Volver</a>
    </div>
</body>
</html>