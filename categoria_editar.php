<?php
include_once './validar.php';
include_once './conexion.php';
try {
    $id = $_GET["id"];
    conectar();
    $sql = "SELECT * FROM categoria WHERE id = $id";
    $registros = consultar($sql);
    $categoria = $registros[0];
    #var_dump($categoria);
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Intranet</title>
        <?php require_once './cabecera.php'; ?>
    </head>
    <body>
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1>Actualizar categoria</h1>
            <form style="max-width: 600px; margin: 0 auto;" action="categoria_procesar.php" method="post">
                <input type="hidden" value="<?= $categoria['id'] ?>" name="id"/>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" value="<?= $categoria['nombre'] ?>"
                           class="form-control" id="nombre" name="nombre">
                    <label for="nombre">Nombre</label>
                </div> 
                <div class="form-floating mb-3 mt-3">
                    <textarea class="form-control" 
                              name="descripcion"><?= $categoria['descripcion'] ?></textarea>
                    <label for="descripcion">Descripción</label>
                </div>                 
                <p style="text-align: center">
                    <button type="submit" class="btn btn-success">Actualizar</button>                        
                </p>  
            </form> 
        </div>      
        <?php require_once './include/footer.php'; ?>
    </body>
</html>