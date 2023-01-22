<?php

include_once './conexion.php';

$nombre = $_GET["nombre"]; // Dar formato "rAul    joSE    PeralTA" a "RAUL JOSE PERALTA"
$correo = $_GET["correo"]; // Dar formato "sdsdk@UTP.EDI.pe" a "sdsdk@utp.edi.pe"
$mensaje = $_GET["mensaje"]; // No se modifica, pero se debe controlar el tamaño

$sql = "INSERT INTO contacto(nombre, correo, mensaje)"
        . " VALUES (UPPER('$nombre'), LOWER('$correo'), '$mensaje')";

#var_dump($sql);

try {
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: contacto.php?estado=ok");
} catch (Exception $e) {
    header("location: contacto.php?estado=fail");
}
