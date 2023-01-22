<?php
include_once './conexion.php';
$dni = $_POST["dni"];
$pass = $_POST["clave"];
$sql = "SELECT * FROM usuarios WHERE dni = '$dni' AND "
        . "AES_DECRYPT(clave, '$pass') = '$pass';";
try {
    conectar();
    $resultado = consultar($sql);
    desconectar();
} catch (Exception $exc) {
    header("location: login.php");
}
if (count($resultado) == 1) :
    session_start();
    $_SESSION["acceso"] = "E14007a";
    #var_dump($resultado[0]);
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Inicio Sesion</title>
            <meta charset="UTF-8">        
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        <body>
            <?php require_once './include/header_intranet.php'; ?>        
            <div class="container">
                <h1>Bienvenido a la Intranet</h1>
                <a href="categorias.php">
                    Mantenimiento de categorias y productos
                </a>
            </div>
        <?php require_once './include/footer.php'; ?>
        </body>
    </html>
    <?php
else:
    session_start();
    session_destroy();
    header("location: login.php?e=user");
endif;



