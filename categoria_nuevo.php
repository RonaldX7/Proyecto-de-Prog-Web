<?php include_once './validar.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
        <?php require_once './cabecera.php'; ?>
    </head>
    <body>
        <?php require_once './include/header_intranet.php'; ?>
        <div class="container">
            <h1 style="text-align: center">Agregar categoria</h1>
            <form style="max-width: 600px; margin: 0 auto;" action="categoria_procesar.php" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <label for="nombre">Nombre</label>
                </div> 
                <div class="form-floating mb-3 mt-3">
                    <textarea class="form-control" name="descripcion"></textarea>
                    <label for="descripcion">Descripción</label>
                </div>                 
                <p style="text-align: center">
                    <button type="submit" class="btn btn-success">Agregar</button>                        
                </p>  
            </form>
        </div>
        <?php require_once './include/footer.php'; ?>
    </body>
</html>