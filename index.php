<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes | POLI</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-bottom: none;
        }
        
        .card-header i {
            font-size: 60px;
            margin-bottom: 15px;
            animation: fadeInDown 0.6s ease;
        }
        
        .card-header h2 {
            margin: 0;
            font-weight: 600;
            animation: fadeInUp 0.6s ease;
        }
        
        .card-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        
        .card-body {
            padding: 40px;
            background: white;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: #667eea;
        }
        
        .form-control {
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }
        
        .btn-guardar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-guardar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-guardar:active {
            transform: translateY(0);
        }
        
        .btn-guardar i {
            margin-right: 8px;
        }
        
        .btn-link-custom {
            display: inline-block;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 25px;
            background: #f8f9fc;
        }
        
        .btn-link-custom:hover {
            background: #667eea;
            color: white;
            transform: translateX(5px);
        }
        
        .footer-links {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e1e5e9;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Animación para el formulario */
        .form-group {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .btn-guardar { animation: fadeInUp 0.6s ease 0.3s forwards; opacity: 0; }
        .footer-links { animation: fadeInUp 0.6s ease 0.4s forwards; opacity: 0; }
        
        /* Estilo para mensajes de error (si los hay) */
        .alert-custom {
            border-radius: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i>
                        <h2>Registro POLI</h2>
                        <p>Completa el formulario para registrar un nuevo estudiante</p>
                    </div>
                    
                    <div class="card-body">
                        <!-- Mostrar mensaje de éxito si viene de guardar.php -->
                        <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                            <div class="alert alert-success alert-custom fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                ¡Estudiante registrado exitosamente!
                            </div>
                        <?php endif; ?>
                        
                        <form action="guardar.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">
                                    <i class="fas fa-user"></i> Nombre completo
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nombre" 
                                       name="nombre" 
                                       required 
                                       placeholder="Ej: Juan Pérez"
                                       autofocus>
                            </div>
                            
                            <div class="form-group">
                                <label for="correo">
                                    <i class="fas fa-envelope"></i> Correo electrónico
                                </label>
                                <input type="email" 
                                       class="form-control" 
                                       id="correo" 
                                       name="correo" 
                                       required 
                                       placeholder="Ej: juan@politecnico.edu.co">
                            </div>
                            
                            <button type="submit" class="btn-guardar">
                                <i class="fas fa-save"></i> Guardar estudiante
                            </button>
                        </form>
                        
                        <div class="footer-links">
                            <a href="listar.php" class="btn-link-custom">
                                <i class="fas fa-list me-2"></i>Ver lista de estudiantes
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Información adicional -->
                <div class="text-center mt-4">
                    <small style="color: white; opacity: 0.8;">
                        <i class="fas fa-shield-alt me-1"></i>
                        Sistema de Registro Estudiantil - POLI
                    </small>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Pequeño script para mejorar la experiencia
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = document.querySelector('.btn-guardar');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';
            btn.disabled = true;
        });
    </script>
</body>
</html>