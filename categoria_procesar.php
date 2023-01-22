<?php
include_once './validar.php';
include_once './conexion.php';

$nombre = htmlentities($_POST["nombre"]);
$desc = htmlentities($_POST["descripcion"]);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE categoria SET nombre = '$nombre',"
            . " descripcion = '$desc'"
            . " WHERE id = $id";
} else {
    $sql = "INSERT INTO categoria(nombre, descripcion)"
            . " VALUES ('$nombre', '$desc')";
}

#var_dump($sql);

try {
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: categorias.php");
} catch (Exception $e) {
    die($e->getMessage());
}