<?php
include_once './validar.php';
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM categoria";
$registros = consultar($sql);
#var_dump($registros);
desconectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
        <?php require_once './cabecera.php'; ?>
    </head>
    <body>
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1>Mantenimiento de categorias</h1>
            <a href="categoria_nuevo.php" class="btn btn-primary">
                Agregar
            </a>
            <table class="table table-hover">                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2">Aciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $categoria):
                        ?>
                        <tr>
                            <td><?= $categoria["id"] ?></td>
                            <td><?= $categoria["nombre"] ?></td>
                            <td><?= $categoria["descripcion"] ?></td>
                            <td>
                                <a href="categoria_editar.php?id=<?= $categoria["id"] ?>">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="categoria_borrar.php?id=<?= $categoria["id"] ?>">
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