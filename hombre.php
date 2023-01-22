<?php
include_once './validar.php';
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM tablahombre_view";
$registros = consultar($sql);
#var_dump($registros);
desconectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mantenimiento de productos</title>
        <?php require_once './cabecera.php'; ?>
    </head>
    <body>
        <!--Encabezado-->
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1 style="text-align: center;">Mantenimiento de productos - hombre</h1>
            <a href="hombre_nuevo.php" class="btn btn-primary">
                Agregar
            </a>
            <table class="table table-hover">                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th colspan="2">Aciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $hombre):
                        ?>
                        <tr>
                            <td><?= $hombre["id"] ?></td>
                            <td><?= htmlspecialchars($hombre["nombre"]) ?></td>
                            <td><?= htmlspecialchars($hombre["descripcion"]) ?></td>
                            <td><?= $hombre["cat"] ?></td>
                            <td><?= $hombre["precio"] ?></td>
                            <td><?= $hombre["cantidad"] ?></td>
                            <td>
                                <p>RUTA: <?= $hombre['imagen'] ?>
                                </p>
                                <img src="<?= $hombre['imagen'] ?>" width="30"/>                    
                            </td>
                            <td>
                                <a href="hombre_editar.php?id=<?= $hombre["id"] ?>">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="hombre_borrar.php?id=<?= $hombre["id"] ?>">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php require_once './include/footer.php'; ?>
    </body>
</html>