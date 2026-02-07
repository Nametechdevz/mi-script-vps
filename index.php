<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VPS Manager Pro | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #0f172a; color: #e2e8f0; font-family: 'Inter', sans-serif; }
        .sidebar { background: #1e293b; min-height: 100vh; border-right: 1px solid #334155; }
        .card { background: #1e293b; border: 1px solid #334155; border-radius: 12px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); border-color: #38bdf8; }
        .btn-primary { background: #38bdf8; border: none; font-weight: 600; }
        .btn-primary:hover { background: #0ea5e9; }
        .nav-link { color: #94a3b8; font-weight: 500; }
        .nav-link.active { color: #38bdf8; background: rgba(56, 189, 248, 0.1); border-radius: 8px; }
        .status-dot { height: 10px; width: 10px; background-color: #22c55e; border-radius: 50%; display: inline-block; margin-right: 5px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar p-4">
            <h4 class="text-info mb-4"><i class="fas fa-server"></i> VPS Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link active" href="#"><i class="fas fa-home me-2"></i> Inicio</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-users me-2"></i> Usuarios</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-shield-alt me-2"></i> Puertos</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-terminal me-2"></i> Consola</a></li>
            </ul>
        </nav>

        <main class="col-md-10 p-5">
            <div class="d-flex justify-content-between mb-4">
                <h2>Panel de Administración</h2>
                <div class="badge bg-dark p-2 border border-secondary">
                    <span class="status-dot"></span> Servidor Online: <?php echo $_SERVER['SERVER_ADDR']; ?>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5><i class="fas fa-plug text-info"></i> Abrir Puertos</h5>
                        <p class="text-muted small">Configura SSH, SSL, V2Ray</p>
                        <form action="procesar.php" method="POST">
                            <select name="servicio" class="form-select bg-dark text-white border-secondary mb-3">
                                <option value="ssh">SSH (22)</option>
                                <option value="ssl">SSL (443)</option>
                                <option value="v2ray">V2Ray (8080)</option>
                                <option value="custom">Otro Puerto</option>
                            </select>
                            <input type="number" name="puerto" class="form-control bg-dark text-white border-secondary mb-3" placeholder="Ej: 8080">
                            <button class="btn btn-primary w-100">Activar Puerto</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5><i class="fas fa-user-plus text-success"></i> Gestión de Usuarios</h5>
                        <form action="procesar.php" method="POST">
                            <input type="text" name="user" class="form-control bg-dark text-white border-secondary mb-3" placeholder="Usuario">
                            <input type="password" name="pass" class="form-control bg-dark text-white border-secondary mb-3" placeholder="Contraseña">
                            <button class="btn btn-success w-100">Crear Cuenta</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5><i class="fas fa-pen-fancy text-warning"></i> Banner SSH</h5>
                        <p class="text-muted small">Mensaje al conectar</p>
                        <form action="procesar.php" method="POST">
                            <textarea name="banner" class="form-control bg-dark text-white border-secondary mb-3" rows="3" placeholder="Bienvenido al servidor..."></textarea>
                            <button class="btn btn-warning w-100">Actualizar Banner</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h4 class="mb-4">Servicios Activos</h4>
                <div class="card p-3">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Puerto</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SSH</td>
                                <td>22</td>
                                <td><span class="badge bg-success">Activo</span></td>
                                <td><button class="btn btn-sm btn-outline-danger">Detener</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
