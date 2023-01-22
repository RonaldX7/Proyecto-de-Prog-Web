<?php
include_once './validar.php';
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM tablamujer_view";
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
            <h1 style="text-align: center;">Mantenimiento de productos - mujer</h1>
            <a href="mujer_nuevo.php" class="btn btn-primary">
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
                    foreach ($registros as $mujer):
                        ?>
                        <tr>
                            <td><?= $mujer["id"] ?></td>
                            <td><?= htmlspecialchars($mujer["nombre"]) ?></td>
                            <td><?= htmlspecialchars($mujer["descripcion"]) ?></td>
                            <td><?= $mujer["cat"] ?></td>
                            <td><?= $mujer["precio"] ?></td>
                            <td><?= $mujer["cantidad"] ?></td>
                            <td>
                                <p>RUTA: <?= $mujer['imagen'] ?>
                                </p>
                                <img src="<?= $mujer['imagen'] ?>" width="30"/>                    
                            </td>
                            <td>
                                <a href="mujer_editar.php?id=<?= $mujer["id"] ?>">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="mujer_borrar.php?id=<?= $mujer["id"] ?>">
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