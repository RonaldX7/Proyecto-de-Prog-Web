<?php
include_once './validar.php';
include_once './conexion.php';
try {
    $id = $_GET["id"];
    conectar();
    $sql = "SELECT * FROM tablaniños WHERE id = $id";
    $registros = consultar($sql);
    $ninos = $registros[0];
    #var_dump($producto);
    $sqlAux = "SELECT id, nombre FROM categoria";
    $categorias = consultar($sqlAux);
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar producto</title>
        <?php require_once './cabecera.php'; ?>
    </head>
    <body>
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1>Actualizar producto</h1>
            <form style="max-width: 600px; margin: 0 auto;" enctype="multipart/form-data"
                  action="ninos_procesar.php" method="post">
                <input type="hidden" value="<?= $ninos['id'] ?>" name="id"/>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" value="<?= $ninos['nombre'] ?>"
                           class="form-control" id="nombre" name="nombre">
                    <label for="nombre">Nombre</label>
                </div> 
                <div class="form-floating mb-3 mt-3">
                    <textarea class="form-control" 
                              name="descripcion"><?= $ninos['descripcion'] ?></textarea>
                    <label for="descripcion">Descripción</label>
                </div>      
                <div class="form-floating mb-3 mt-3">
                    <select class="form-control" id="cat" name="cat">
                        <?php
                        foreach ($categorias as $cat) :
                            ?>
                            <option value="<?= $cat['id'] ?>"
                                    <?= ($cat['id'] == $ninos['cat']) ? "selected" : ""?>>
                                <?= $cat['nombre'] ?>
                            </option>
                            <?php
                        endforeach;
                        ?>               
                    </select>
                    <label for="cat">Categoria</label>
                </div> 
                <div class="form-floating mb-3 mt-3">
                    <input type="number" value="<?= $ninos['precio'] ?>"
                           class="form-control" id="precio" name="precio" min="0" step="0.01">
                    <label for="precio">Precio</label>
                </div> 
                <div class="form-floating mb-3 mt-3">
                    <input type="number" value="<?= $ninos['cantidad'] ?>"
                           class="form-control" id="cantidad" name="cantidad" min="0">
                    <label for="cantidad">Cantidad</label>
                </div>                 
                <div class="form-floating mb-3 mt-3">
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <label for="imagen">Imagen</label>
                </div> 
                <p style="text-align: center">
                    <button type="submit" class="btn btn-success">Actualizar</button>                        
                </p>  
            </form> 
        </div>      
        <?php require_once './include/footer.php'; ?>
    </body>
</html>