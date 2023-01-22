<?php
include_once './validar.php';
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM tablaniños_view";
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
            <h1 style="text-align: center;">Mantenimiento de productos - niños</h1>
            <a href="ninos_nuevo.php" class="btn btn-primary">
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
                    foreach ($registros as $ninos):
                        ?>
                        <tr>
                            <td><?= $ninos["id"] ?></td>
                            <td><?= htmlspecialchars($ninos["nombre"]) ?></td>
                            <td><?= htmlspecialchars($ninos["descripcion"]) ?></td>
                            <td><?= $ninos["cat"] ?></td>
                            <td><?= $ninos["precio"] ?></td>
                            <td><?= $ninos["cantidad"] ?></td>
                            <td>
                                <p>RUTA: <?= $ninos['imagen'] ?>
                                </p>
                                <img src="<?= $ninos['imagen'] ?>" width="30"/>                    
                            </td>
                            <td>
                                <a href="ninos_editar.php?id=<?= $ninos["id"] ?>">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="ninos_borrar.php?id=<?= $ninos["id"] ?>">
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