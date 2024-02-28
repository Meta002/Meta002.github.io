<?php
require("conexion.php");

$descripcion = $_POST['descripcion'];

$sentencia = $mbd->prepare("INSERT INTO categorias(descripcion) VALUES (?)");
$sentencia->bindParam(1, $descripcion);
$sentencia->execute();

header('Location: mostrarCategorias.php');

 ?>
