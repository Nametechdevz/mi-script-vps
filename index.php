<?php
// CONFIGURACIÓN - Pon los datos de tu VPS aquí
$vps_host = '127.0.0.1'; // Se conecta a sí mismo
$vps_user = 'root';
$vps_pass = 'TU_CONTRASEÑA_AQUÍ'; 

$mensaje = "";
if ($_POST) {
    $accion = $_POST['accion'];
    $conn = ssh2_connect($vps_host, 22);
    if (ssh2_auth_password($conn, $vps_user, $vps_pass)) {
        switch ($accion) {
            case 'ssh_ssl':
                ssh2_exec($conn, "ufw allow 22/tcp; ufw allow 443/tcp; ufw reload");
                $mensaje = "Puertos SSH (22) y SSL (443) abiertos con éxito.";
                break;
            case 'v2ray':
                ssh2_exec($conn, "apt install v2ray -y; systemctl enable v2ray; systemctl start v2ray");
                $mensaje = "Protocolo V2Ray instalado y activo.";
                break;
            case 'banner':
                $txt = $_POST['texto_banner'];
                ssh2_exec($conn, "echo '$txt' > /etc/issue.net; service ssh restart");
                $mensaje = "Banner de conexión actualizado.";
                break;
        }
    } else { $mensaje = "Error de conexión SSH interna."; }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nametechdevz | Premium Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #0d1117; color: #c9d1d9; font-family: 'Inter', sans-serif; }
        .navbar { background: #161b22; border-bottom: 1px solid #30363d; }
        .card { background: #161b22; border: 1px solid #30363d; border-radius: 12px; margin-bottom: 20px; }
        .btn-neon { background: #238636; color: white; border: none; transition: 0.3s; }
        .btn-neon:hover { background: #2ea043; box-shadow: 0 0 10px #2ea043; }
        .form-control { background: #0d1117; border: 1px solid #30363d; color: white; }
        .form-control:focus { background: #0d1117; color: white; border-color: #58a6ff; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark p-3">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="fas fa-terminal me-2"></i> NAMETECHDEVZ VPS</span>
    </div>
</nav>

<div class="container mt-5">
    <?php if($mensaje): ?>
        <div class="alert alert-success border-0 bg-success text-white"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <h4><i class="fas fa-server text-primary me-2"></i> Gestión de Puertos</h4>
                <p class="text-muted">Activa servicios con un solo clic.</p>
                <div class="d-grid gap-2">
                    <form method="POST"><input type="hidden" name="accion" value="ssh_ssl">
                        <button class="btn btn-neon w-100 mb-2">ABRIR SSH/SSL (22, 443)</button>
                    </form>
                    <form method="POST"><input type="hidden" name="accion" value="v2ray">
                        <button class="btn btn-neon w-100">INSTALAR V2RAY</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4">
                <h4><i class="fas fa-edit text-warning me-2"></i> Banner de Bienvenida</h4>
                <form method="POST">
                    <input type="hidden" name="accion" value="banner">
                    <textarea name="texto_banner" class="form-control mb-3" rows="3" placeholder="Escribe el mensaje de tu servidor aquí..."></textarea>
                    <button class="btn btn-outline-warning w-100">ACTUALIZAR BANNER</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
