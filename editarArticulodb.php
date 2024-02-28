<?php
require("conexion.php");

extract($_POST);

$sentencia = $mbd->prepare("UPDATE articulos SET nombre=?, descripcion=?, marca=?, cantidad=?, precio=?, categoria_id=? WHERE id=?");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $descripcion);
$sentencia->bindParam(3, $marca);
$sentencia->bindParam(4, $cantidad);
$sentencia->bindParam(5, $precio);
$sentencia->bindParam(6, $categoriaId);
$sentencia->bindParam(7, $id);
$sentencia->execute();

header('Location: mostrarArticulos.php');

 ?>
