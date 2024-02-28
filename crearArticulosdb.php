<?php
require("conexion.php");

extract($_POST);

$sentencia = $mbd->prepare("INSERT INTO articulos(nombre,descripcion,marca,cantidad,precio,categoria_id) VALUES (?,?,?,?,?,?)");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $descripcion);
$sentencia->bindParam(3, $marca);
$sentencia->bindParam(4, $cantidad);
$sentencia->bindParam(5, $precio);
$sentencia->bindParam(6, $categoriaId);

$sentencia->execute();

header('Location: mostrarArticulos.php');

 ?>
