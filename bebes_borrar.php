<?php
include_once './validar.php';
include_once './conexion.php';

$id = $_GET['id'];
$sql = "DELETE FROM tablabebes WHERE id = $id";

#var_dump($sql);

try {
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: bebes.php");
} catch (Exception $e) {
    die($e->getMessage());
}
