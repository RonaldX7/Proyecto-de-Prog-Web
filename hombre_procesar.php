<?php

include_once './validar.php';
include_once './conexion.php';

$nombre = $_POST["nombre"];
$desc = $_POST["descripcion"];
$cat = $_POST["cat"];
$precio = $_POST["precio"];
$cant = $_POST["cantidad"];


$target_dir = "img/productos/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
$uploadOk = true;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (file_exists($_FILES['imagen']['tmp_name'])) {
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            #echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            #echo "File WRONG";
            $uploadOk = false;
        }
    }

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        $img = "http://localhost/TF_GRUPO_01/img/productos/" . basename($_FILES["imagen"]["name"]);
    } else {
        $img = "";
    }
} else {
    $uploadOk = false;
}




if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE tablahombre SET nombre = '$nombre',"
            . " descripcion = '$desc',"
            . " cat = '$cat',"
            . " precio = '$precio',";
    $sql .= ($uploadOk) ? "imagen = '$img'," : "";
    $sql .= " cantidad = '$cant'"
            . " WHERE id = $id";
} else {
    $sql = "INSERT INTO tablahombre(nombre, descripcion, cat,";
    $sql .= ($uploadOk) ? "imagen," : "";
    $sql .= " precio, cantidad)"
            . " VALUES ('$nombre', '$desc', $cat, ";
    $sql .= ($uploadOk) ? "'$img'," : "";
    $sql .= "$precio, $cant)";
}

#var_dump($sql);


try {
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: hombre.php");
} catch (Exception $e) {
    die($e->getMessage());
}