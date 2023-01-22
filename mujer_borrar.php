<?php
include_once './validar.php';
include_once './conexion.php';

$id = $_GET['id'];
$sql = "DELETE FROM tablamujer WHERE id = $id";

#var_dump($sql);

try {
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: mujer.php");
} catch (Exception $e) {
    die($e->getMessage());
}
