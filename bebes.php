<?php
include_once './validar.php';
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM tablabebes_view";
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
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1 style="text-align: center;">Mantenimiento de productos - bebes</h1>
            <a href="bebes_nuevo.php" class="btn btn-primary">
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
                    foreach ($registros as $bebes):
                        ?>
                        <tr>
                            <td><?= $bebes["id"] ?></td>
                            <td><?= htmlspecialchars($bebes["nombre"]) ?></td>
                            <td><?= htmlspecialchars($bebes["descripcion"]) ?></td>
                            <td><?= $bebes["cat"] ?></td>
                            <td><?= $bebes["precio"] ?></td>
                            <td><?= $bebes["cantidad"] ?></td>
                            <td>
                                <p>RUTA: <?= $bebes['imagen'] ?>
                                </p>
                                <img src="<?= $bebes['imagen'] ?>" width="30"/>                    
                            </td>
                            <td>
                                <a href="bebes_editar.php?id=<?= $bebes["id"] ?>">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="bebes_borrar.php?id=<?= $bebes["id"] ?>">
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