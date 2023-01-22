<?php
include_once './conexion.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM tablaniños";
$registros = consultar($sql);
#var_dump($registros);
desconectar();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Niños - Lion Store</title>
        <?php require_once './cabecera.php'; ?>
    </head>

    <body style="background-color: gray;">

        <!--Encabezado-->
        <?php require_once './include/header.php'; ?>

        <!--Cuerpo-->
        <div class="container">
            <div class="row">
                <?php foreach ($registros as $p) { ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                        <h4 style="text-align: center;" >
                            <?= $p['nombre'] ?>
                        </h4>
                        <img src="<?= $p['imagen'] ? $p['imagen'] : "img/productos/p-lorem.png" ?>" alt="producto" class="img-fluid"/>
                        <h4 style="text-align: center;"><?= "Precio: S/" . $p['precio'] ?></h4>
                        <p style="text-align: center">
                            <a href="#" class="btn btn-success">Comprar</a>                        
                        </p>                    
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Pie de página -->
        <?php require_once './include/footer.php'; ?>
    </body>
</html>
