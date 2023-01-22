<!DOCTYPE html>

<html>
    <head>
        <title>Contacto - Detroit Store</title>
        <?php require_once './cabecera.php'; ?>

    </head>
    <body>
        
        <!--Encabezado-->
        <?php require_once './include/header.php'; ?>

        <div class="container">
            <h1 style="text-align: center">Contacto</h1>
        <form style="max-width: 600px; margin: 0 auto;" method="GET" action="enviar.php">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="correo" name="correo" required>
                    <label for="correo">Correo</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <textarea id="mensaje" name="mensaje" class="form-control" maxlength="200" required></textarea>
                    <label for="mensaje">Mensaje</label>
                </div>
                <p style="text-align: center">
                    <button type="submit" class="btn btn-success">Enviar</button>                        
                </p>  
            </form>
            <?php if (isset($_GET["estado"])) : ?>
                <div class="alert alert-success">
                    <?=$_GET["estado"] == "ok" ?"Mensaje enviado" : "Inténtelo más tarde"?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pie de página -->
        <?php require_once './include/footer.php'; ?>
    </body>
</html>