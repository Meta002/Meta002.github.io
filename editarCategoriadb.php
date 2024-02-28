<?php
require("conexion.php");

$id = $_POST['id'];
$descripion = $_POST['descripcion'];


$sentencia = $mbd->prepare("UPDATE categorias SET descripcion=? WHERE id=?");
$sentencia->bindParam(1, $descripion);
$sentencia->bindParam(2, $id);
$sentencia->execute();

header('Location: mostrarCategorias.php?luis=ok');

 ?>
