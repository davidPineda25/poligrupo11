<?php
include("conexion.php");
 
$sql = "SELECT * FROM estudiantes";
$resultado = mysqli_query($conexion, $sql);
 
if (!$resultado) {
    die("Error en consulta: " . mysqli_error($conexion));
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Lista de estudiantes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
            display: inline-block;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        tr:hover {
            background: #f9f9f9;
        }
        
        .volver-btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 15px;
            transition: background 0.3s;
        }
        
        .volver-btn:hover {
            background: #5a67d8;
        }
        
        .contador {
            background: #e0e7ff;
            color: #667eea;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-left: 15px;
        }
        
        .vacio {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h2>📋 Lista de estudiantes</h2>
                <span class="contador">Total: <?php echo mysqli_num_rows($resultado); ?></span>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($resultado) > 0): ?>
                    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="vacio">No hay estudiantes registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <a href="index.php" class="volver-btn">← Volver</a>
    </div>
</body>
</html>