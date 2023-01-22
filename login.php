<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <?php require_once './cabecera.php'; ?>
    </head>

    <body>
        <!--Encabezado-->
        <?php require_once './include/header.php'; ?>

        <div class="container">
            <h1 style="text-align: center">Acceso al sistema</h1>
            <form style="max-width: 400px; margin: 0 auto;" method="POST" action="intranet.php">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="dni" pattern="[0-9]{8}"
                           placeholder="DNI" name="dni">
                    <label for="dni">DNI</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="clave" placeholder="Colocar contraseña" name="clave">
                    <label for="clave">Contraseña</label>
                </div>
                <p style="text-align: center">
                    <button type="submit" class="btn btn-success">Ingresar</button>                        
                </p>  
            </form>
            <?php if (isset($_GET["e"])) : ?>
                <div class="alert alert-danger">
                    <?=
                    $_GET["e"] == "user" ?
                            "Credenciales inválidas " : ""
                    ?>
                    <?=
                    $_GET["e"] == "logout" ?
                            "Sesión cerrada " : ""
                    ?>
                    <?=
                    $_GET["e"] == "access" ?
                            "Requiere acceso " : ""
                    ?>
                </div>
            <?php endif; ?>
            <h4>Consideraciones</h4>
            <ul>
                <li>El DNI debe contener 8 dígitos</li>                
            </ul>
        </div>

        <!-- Pie de página -->
        <?php require_once './include/footer.php'; ?>
    </body>
</html>

